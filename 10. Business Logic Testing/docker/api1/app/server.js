const express = require('express')
const app = express()
const port = 3000
const store = require('./store')
const bodyParser = require('body-parser')
const SECRET = "MyS3cr3tKeY";

app.use(bodyParser.json())
store.init()

app.get('/', (req, res) => res.send("I'm API"))
app.get('/api/', (req, res) => res.send("I'm API"))

// getAllItem
app.get('/api/item/', (req, res) => {
    console.log("get /item/")
    res.send({ items: store.getAllItems() })
})

// getEachItem
app.get('/api/item/:index', (req, res) => {
    const index = Number(req.params.index)
    const item = store.getItem(index)
    res.send({ item })
})

// addNewItem
app.post('/api/item/', (req, res) => {
    if (typeof req.body.item !== 'string') {
        res.status(400)
        res.send({ "Status": "Error", "Message": "Something wrong!" }).end()
        return
    }
    const item = req.body.item
    store.addItem(item)

    res.status(201)
    res.send({ "Status": "Success", "Message": "Add new item done." }).end()
})

// updateItem
app.put('/api/item/:index', (req, res) => {
    if (typeof Number(req.params.index) !== 'number' || typeof req.body.item !== 'string'){
        res.status(400)
        res.send({ "Status": "Error", "Message": "Something wrong!" }).end()
        return
    }
    const index = Number(req.params.index)
    const item = store.getItem(index)
    if ( item === undefined){
        res.status(404)
        res.send({ "Status": "Error", "Message": "Item not found!" }).end()
        return
    }
    const oldItem = store.updateItem(index, req.body.item)

    res.status(200)
    res.send({ "Status": "Success", "Message": "Update item : " + String(index) }).end()
})

// deleteItem
app.delete('/api/item/:index', (req, res) => {
    if (typeof Number(req.params.index) !== 'number'){
        res.status(400)
        res.send({ "Status": "Error", "Message": "Something wrong!" }).end()
        return
    }
    const index = Number(req.params.index)
    const item = store.getItem(index)
    if ( item === undefined){
        res.status(404)
        res.send({ "Status": "Error", "Message": "Item not found!" }).end()
        return
    }
    const itemList = store.removeItem(index)
    res.status(200)
    res.send({ "Status": "Success", "Message": "Delete item : " + String(index) }).end()
});

// login
const jwt = require("jwt-simple")
const loginMiddleware = (req, res, next) => {
    if(req.body.username === "adm1n" && 
       req.body.password === "@dminP@ssw0rd") next();
    else 
        res.send("Wrong username and password")
}
app.post("/api/authentication", loginMiddleware, (req, res) => {
    const currentDate = new Date().getTime() //มาจากคำว่า issued at time (สร้างเมื่อ)
    const sec = 1000;
    const minutes = sec * 60;
    const hours = minutes * 60;
    // const days = hours * 24;
    // const years = days * 365;
    const payload = {
        sub: req.body.username,
        iat: Math.floor(new Date(currentDate).getTime() / 1000),
        exp: Math.floor(new Date(currentDate + (hours)).getTime() / 1000)
    };
    const SECRET = "MyS3cr3tKeY" //ในการใช้งานจริง คีย์นี้ให้เก็บเป็นความลับ
    res.send(jwt.encode(payload, SECRET, "HS512"))
})

// authentication
const passport = require("passport");
const ExtractJwt = require("passport-jwt").ExtractJwt;
const JwtStrategy = require("passport-jwt").Strategy;
const jwtOptions = {
    jwtFromRequest: ExtractJwt.fromAuthHeaderAsBearerToken(),
    jsonWebTokenOptions : {
        "maxAge": "1h"
    },    
    secretOrKey: SECRET,
    algorithms: ["HS512"]
};
const jwtAuth = new JwtStrategy(jwtOptions, (payload, done) => {
   if (payload.sub === "adm1n") done(null, true);
   else done(null, false);
});
passport.use(jwtAuth);
const requireJWTAuth = passport.authenticate("jwt",{session:false});

// authenticationAPIs
app.get("/api/merchant/amount_summary", requireJWTAuth, (req, res) => {
    console.log(requireJWTAuth);
    res.status(200)
    res.send({ "Status": "Success", "Message": "ยอดเงินคงเหลือ 5,120,000฿"}).end()
});

app.get("/api/merchant/authentication-t0ken", requireJWTAuth, (req, res) => {
    console.log(requireJWTAuth);
    res.status(200)
    res.send({ "Status": "Success", "Message": "FLAG{@p15_1N_J@va5cr1PT_ar3_3@5y_t0_f1nD}"}).end()
});

app.listen(port, () => console.log(`Example app listening on port ${port}!`))
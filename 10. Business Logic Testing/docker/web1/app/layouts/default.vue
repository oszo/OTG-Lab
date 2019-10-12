<template>
  <v-app light>
    <v-navigation-drawer
      v-model="drawer"
      :mini-variant="miniVariant"
      :clipped="clipped"
      fixed
      app
    >
      <v-list>
        <v-list-tile
          v-for="(item, i) in items"
          :key="i"
          :to="item.to"
          router
          exact
        >
          <v-list-tile-action>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title v-text="item.title" />
          </v-list-tile-content>
        </v-list-tile>
        <v-list-tile
          icon
          @click.stop="miniVariant = !miniVariant"
        >
          <v-list-tile-action>
            <v-icon>{{ `chevron_${miniVariant ? 'right' : 'left'}` }}</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title class="grey--text">
            </v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
      </v-list>
    </v-navigation-drawer>
    <v-toolbar
      :clipped-left="clipped"
      fixed
      app
    >
      <v-btn
        icon
        @click="drawer = !drawer"
      >
        <v-icon>menu</v-icon>
      </v-btn>
      <v-toolbar-title v-text="title" />
      <v-spacer />
      <v-btn
        icon
        @click.stop="rightDrawer = !rightDrawer"
      >
        <v-icon>more_vert</v-icon>
      </v-btn>
    </v-toolbar>
    <v-content>
      <v-container>
        <nuxt />
      </v-container>
    </v-content>
    <v-navigation-drawer
      v-model="rightDrawer"
      :right="right"
      temporary
      fixed
    >
      <v-toolbar color="teal">
        <v-icon>
          face
        </v-icon>
        <v-toolbar-title>Guest Account</v-toolbar-title>
      </v-toolbar>

      <v-list two-line subheader>
        <v-subheader>
        </v-subheader>
        <v-toolbar-title>Merchant Login</v-toolbar-title>
        <v-layout row wrap>
          <v-flex xs10 offset-xs1>
            <v-form
              ref="form"
              v-model="valid"
              lazy-validation
            >
              <v-text-field
                v-model="username"
                :rules="[rules.required]"
                name="input-password"
                label="Username"
                required
              ></v-text-field>

              <v-text-field
                v-model="password"
                :append-icon="show1 ? 'visibility' : 'visibility_off'"
                :rules="[rules.required]"
                :type="show1 ? 'text' : 'password'"
                name="input-password"
                label="Password"
                @click:append="show1 = !show1"
              ></v-text-field>

              <v-btn
                :disabled="!valid"
                color="teal"
                @click="validate"
              >
                Login
              </v-btn>

              <v-btn
                @click="resetValidation"
              >
                Reset Form
              </v-btn>

            </v-form>
          </v-flex>
        </v-layout>
      </v-list>

      <v-divider></v-divider>
      <v-list
        subheader
        two-line
      >
        <v-subheader>Configuration</v-subheader>

        <v-list-tile @click="" disabled>
          <v-list-tile-action>
            <v-switch v-model="contact"></v-switch>
          </v-list-tile-action>

          <v-list-tile-content @click="contact = !contact">
            <v-list-tile-title>Show Contact</v-list-tile-title>
            <v-list-tile-sub-title>Allow customer to see contact</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="" disabled>
          <v-list-tile-action>
            <v-switch v-model="content"></v-switch>
          </v-list-tile-action>

          <v-list-tile-content @click="content = !content">
            <v-list-tile-title>Show Contact</v-list-tile-title>
            <v-list-tile-sub-title>Allow customer to see product</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

        <v-list-tile @click="" disabled>
          <v-list-tile-action>
            <v-switch v-model="date"></v-switch>
          </v-list-tile-action>

          <v-list-tile-content @click="date = !date">
            <v-list-tile-title>Show Date</v-list-tile-title>
            <v-list-tile-sub-title>Display date and time</v-list-tile-sub-title>
          </v-list-tile-content>
        </v-list-tile>

      </v-list>
      <v-divider></v-divider>
      <v-list subheader>
        <v-layout row wrap>
          <v-flex xs10 offset-xs1>
            <v-alert
              :value="true"
              color="error"
              icon="warning"
              outline
            >
              Error: Guest user account does not have permission to access merchant service.
            </v-alert>
          </v-flex>
        </v-layout>
      </v-list>

    </v-navigation-drawer>
    <v-footer
      :fixed="fixed"
      app
      gray
    >
      <span>&nbsp;VueStore &copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      clipped: false,
      drawer: false,
      fixed: false,
      items: [
        {
          icon: 'home',
          title: 'Welcome',
          to: '/'
        },
        {
          icon: 'shopping_cart',
          title: 'Store',
          to: '/store'
        }
      ],
      miniVariant: false,
      right: true,
      rightDrawer: false,

      contact: false,
      content: true,
      date: false,
      show1: false,
      username: '',
      password: '',
      rules: {
        required: value => !!value || 'Required.'
      },
      jwt: ''
    }
  },
  
  methods: {
    async validate () {
      if (this.$refs.form.validate()) {
        let res_auth = await this.$http.post('/authen', {
          "username": this.username,
          "password": this.password
        }).then(function (response) {
          this.jwt = res_auth
        }).catch(function (error) {
          console.log(error)
        })
      }
    },
    resetValidation () {
      this.$refs.form.reset()
      this.$refs.form.resetValidation()
    },
    async validate_dev () {
      if (this.$refs.form.validate_dev()) {
        let res_auth = await this.$http.post('/authentication', {
          "username": "adm1n",
          "password": "@dminP@ssw0rd",
          "mode": "dev_mode"
        }).then(function (response) {
          this.jwt = res_auth
        }).catch(function (error) {
          console.log(error)
        })
      }
    },
    async get_amount_summary () {
      if (this.jwt !== "") {
        let req_auth = axios.create({ 
          headers: { Authorization: "Bearer " + this.jwt} 
        });
        let res_auth = await req_auth.get('/merchant/amount_summary')
        .then(function (response) {
          console.log(res_auth.Message)
        }).catch(function (error) {
          console.log(error)
        })
      }
    },
    async get_amount_summary () {
      if (this.jwt !== "") {
        let req_auth = axios.create({ 
          headers: { Authorization: "Bearer " + this.jwt} 
        });
        let res_auth = await req_auth.get('/merchant/authentication-t0ken')
        .then(function (response) {
          console.log(res_auth.Message)
        }).catch(function (error) {
          console.log(error)
        })
      }
    },    
  },

  async created() {
    let res = await this.$http.get('/item')
    this.lists = res.data
  }  
}
</script>

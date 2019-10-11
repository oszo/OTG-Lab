
<%@ page language="java" contentType="text/html"%>
<%@ page import="java.text.*,java.util.*" %>
<html>
<head>
<title>Legacy System - VulnCompany</title>
</head>
<%
String userCookie = new String();
Cookie[] reqCookie;
Cookie eachCokie;
reqCookie = request.getCookies();
for (int i = 0; i < reqCookie.length; i++) {
    eachCokie = reqCookie[i];
    if (eachCokie.getName().equals("vulnCompUser")) {
        userCookie = eachCokie.getValue();
    } else {
        out.print("Trying to make me error<br/>");
        return;
    }
}
Base64.Decoder decoder = Base64.getUrlDecoder();
String userPropString = new String(decoder.decode(userCookie));
String[] userProperties = userPropString.split("\\|");

String welcomeMessage = new String();
if (userProperties[1].equals("admin")) {
    welcomeMessage = "Welcome, admin. your flag is ...";
} else {
    welcomeMessage = "Welcome, user. your cannot access flag.";
}

out.print("User Id : " + userProperties[0] + "<br/>");
out.print("Username : " + userProperties[1] + "<br/>");
out.print("Firstname : " + userProperties[2] + "<br/>");
out.print("Lastname : " + userProperties[3] + "<br/>");
out.print("Branch : " + userProperties[4] + "<br/>");

String fullname = new String();
fullname = userProperties[2] + " " + userProperties[3];

if (userProperties[1].equals("admin")) {
    welcomeMessage = "Welcome, admin. your flag is FLAG{B3n3f1t5_0f_Le@k3d_Inf0rMaTioN_1N_3rr0R_Me55@gEs}";
} else {
    welcomeMessage = "Welcome, user. your cannot access flag.";
}

%>
<body>
<h1>Welcome to VulnCompany!</h1>
<h2><% out.print(welcomeMessage + "<br/>"); %></h2>
</body>
</html>
var express = require("express");
var app = express();
var port = 3000;


app.use("/", (req, res) => {
    res.sendFile(__dirname + "/register.php");
});

app.listen(port, () => {
    console.log("Server listening on port " + port);
});
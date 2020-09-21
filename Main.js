"use strict;";

console.log("Start Feed reading ...");

var https = require("follow-redirects").https;

var options = {
  method: "GET",
  hostname: "mein-mmo.de",
  path: "/feed/",
  headers: {},
  maxRedirects: 20,
};

var req = https.request(options, function (res) {
  var chunks = [];

  res.on("data", function (chunk) {
    chunks.push(chunk);
  });

  res.on("end", function (chunk) {
    var body = Buffer.concat(chunks);
    console.log(body.toString());
    var para = document.createElement("P"); // Create a <p> element
    var t = document.createTextNode(body.toString());
    para.appendChild(t);
    document.body.appendChild(para);
  });

  res.on("error", function (error) {
    console.error(error);
  });
});

req.end();

console.log("Finished Feed reading ...");

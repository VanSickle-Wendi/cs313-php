//mathStuff represents module.exports on the math.js page
var mathStuff = require('./math');
var http = require('http');
var url = require('url');
//This is a normal function
function onRequest(req, res) {
      if (req.url === '/home') {
      console.log("Received a request for: " + req.url);
      res.writeHead(200, {"Content-Type": "text/html"})
      res.write('<h1>Welcome to the Home Page</h1>');
      res.end();
   }
   
      else if (req.url === '/getData') {
      res.writeHead(200, {"Content-Type": "application/json"})   
      res.write(JSON.stringify({"name": "Wendi", "class": "cs313"}));
      res.end();
   }
   
      else if (req.url === '/getBalance') {
      res.writeHead(200, {"Content-Type": "text/html"})   
      res.write(mathStuff.adding(2100,1250));
      res.end();
   }
   
      else {
      res.writeHead(404, {"Content-Type": "text/html"})
      res.write('<h1>Page Not Found</h1>');
      res.end();
   }   
}
//This is a function expression onRequest is the funtion from line 4 being passed to this function
var server = http.createServer(onRequest);

server.listen(8888);

console.log('Listening on port 8888....');
//mathStuff.counter represents module.exports.counter from the math.js page
//console.log(mathStuff.counter(['Wendi', 'Todd', 'Trace', 'Riley']));
//console.log(mathStuff.adding(25,75));
//console.log(mathStuff.adding(mathStuff.pi,75));




//var server = http.createServer((req, res) => {
//   if (req.url === '/') {
//      res.write('Hello World');
//      res.end();
//   }
//});



//var http = require('http');
//
//http.createServer(function (req, res) {
//    res.writeHead(200, {'Content-Type': 'text/plain'});
//    res.write('Hello World!');
//    res.end();
//}).listen(8080);





console.log("HELLO WORLD");

console.log(process.argv); //type in arguments at the console

var result = 0;  //baby steps learnyounode supplies numbers to test

  for (var i = 2; i < process.argv.length; i++){
    result += Number(process.argv[i]);
}
  console.log(result);


var fs = require('fs');

var contents = fs.readFileSync(process.argv[2]);
var newLines = contents.toString().split('\n').length-1; //you can avoid .toString by passing 'utf8' as the 2nd argument to readFileSync
console.log(newLines);



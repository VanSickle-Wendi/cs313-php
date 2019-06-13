var fs = require('fs'); //The File System module provides a way of working with the computer's file system.

var contents = fs.readFileSync(process.argv[2]);//*See below for explanation.  See baby.js for process.argv explanation.
var newLines = contents.toString().split('\n').length-1; //you can avoid .toString by passing 'utf8' as the 2nd argument to readFileSync ** See below for explanation.
console.log(newLines);


//*Read the contents of a file without having to open and close it and then put info into variable named contents. The first argument is a file path and that was supplied by the learnyounode program that I'm running this on. Otherwise, I would have to supply my own path to a file. fs.readFileSync() does not take callbacks as a function parameter because it is synchronous. 

//**Convert the contents of the variable 'contents' to a string, then split that string into an array of substrings everytime the new line code(\n) is used. get the length of the file minus 1 because there is no \n character at the end of the file, so you will end up with one extra element for the last line.
var fs = require('fs');
var path = require('path');// The path module provides utilities for working with file and directory paths;

var dir = process.argv[2]; //This is getting the directory or folder name provided by learnyounode for the first command line argument.
var ext = '.' + process.argv[3]; //This is getting the extention type provided by learnyounode for the second command line argument.

fs.readdir(dir, function(err, files){ //* See Below for explanation
   if(err){
      console.log(err);
   }else {
     for(var i = 0; i < files.length; i++) { //Runs through the names of the files.
        if (path.extname(files[i]) == ext){ //** See below for explanation
           console.log(files[i]);
        }
     }
   }
});

//* Asynchronous readdir(3). Reads the contents of a directory. The callback gets two arguments (err, files) where files is an array of the names of the files in the directory excluding '.' and '..'. The learnyounode program I am using is supplying the directory as the first argument[0] and the extention type as the second[1]. dir is explained above, the callback function checks for errors and then 'files' is an array of the names of the files in the directory, excluding '.' and '..'

//** The path.extname() method returns the extension of the path, from the last occurrence of the . (period) character to end of string in the last portion of the path. If there is no . in the last portion of the path, or if the first character of the basename of path (see path.basename()) is ., then an empty string is returned.


//Here is their solution:

const fs = require('fs')
const path = require('path')

const folder = process.argv[2]
const ext = '.' + process.argv[3]

fs.readdir(folder, function (err, files) {
  if (err) return console.error(err)
  files.forEach(function (file) {
    if (path.extname(file) === ext) {
      console.log(file)
    }
  })
})
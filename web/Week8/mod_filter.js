var fs = require('fs') //The File System module provides a way of working with the computer's file system.
var path = require('path')// The path module provides utilities for working with file and directory paths;

module.exports = function (dir, filterStr, callback) {
  fs.readdir(dir, function (err, list) {
    if (err) {
      return callback(err)
    }

    list = list.filter(function (file) {
      return path.extname(file) === '.' + filterStr //===has to be equal and have same value and datatype
    })

    callback(null, list)
  })
}


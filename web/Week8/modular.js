var filterFn = require('./mod_filter') //requires the mod_filter file and puts whatever is in module.export into a variable called filterFN
var dir = process.argv[2] //This is getting the directory or folder name provided by learnyounode for the first command line argument.
var filterStr = process.argv[3] //This is getting the file extention type provided by learnyounode for the first command line argument. No idea why they called it filterStr.

filterFn(dir, filterStr, function (err, list) {
  if (err) {
    return console.error('There was an error:', err)
  }

  list.forEach(function (file) {
    console.log(file)
  })
})


var fs = require('fs');

fs.readFile(process.argv[2], function test(err, contents){ //* ** ***
   if(err){
      console.log(err);
   }else {
      var newLines = contents.toString().split('\n').length-1; 
      console.log(newLines);
   }
});

//Their solution:

var fs = require('fs');
var file = process.argc[2];

fs.readFile(file, function (err, contents){ //* ** ***
   if(err){
      console.log(err);
   }
   var lines = contents.toString().split('\n').length-1; 
      console.log(lines);
});


//*This file does the same thing as the sync file, but it does it asynchronously. fs.readFile() is asynchronous. The first argument is a file path and that was supplied by the learnyounode program that I'm running this on. Otherwise, I would have to supply my own path to a file. fs.readFileSync() does not take callbacks as a function parameter because it is synchronous. fs.readFile() does take callbacks as a function parameter because it is asynchronous. The callback is the 3rd argument.

//**See baby.js for process.argv explanation.

//*** I added 'test' to the function, but it can work without a name. This is called an anonomous function. This function's first argument is an error check. The sencond is a variable that will recieve the contents of the 
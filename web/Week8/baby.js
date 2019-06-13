var result = 0;  //Set results variable = to 0. baby steps learnyounode supplies numbers to test.

  for (var i = 2; i < process.argv.length; i++){//*See below for explanation
    result += Number(process.argv[i]); //**See below for explanation
}
  console.log(result);

//If I want to test this myself, I can type the following at the console prompt, in the same folder as the file:
//$ node baby.js 12 15 16    <-These are just random numbers I came up with. The output would be 43.

//*This is a for loop that first sets the variable i to = 2 because we want to start entering indices at index 2 because process.argv is an array that has two automatic indices. [0]is 'node' and [1]is the path to the file.

//**The process.argv property returns an array containing the command line arguments passed when the Node.js process was launched. The first element will be process.execPath, which is the absolute pathname of the executable that started the Node.js process. For example: '/usr/local/bin/node'    The second element will be the path to the Javascript file being executed. The remaining elements will be any additional command line arguments.
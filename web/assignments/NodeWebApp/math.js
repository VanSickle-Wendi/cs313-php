//This is one way to do it
//module.exports.counter = function(arr){
//   return 'There are ' + arr.length + ' elements in this array';
//};
//The backticks in the return statement are used for templates. You don't have to concatinate
//module.exports.adding = function(a,b){
//   return `The sum is ${a+b}`;
//};
//
//module.exports.pi = 3.142;


//This is another way to do it
//var counter = function(arr){
//   return 'There are ' + arr.length + ' elements in this array';
//};
//The backticks in the return statement are used for templates. You don't have to concatinate
//var adding = function(a,b){
//   return `The sum is ${a+b}`;
//};
//
//var pi = 3.142;

//adding .counter property to the exports object makes that property = to the counter function
//module.exports.counter = counter;
//module.exports.adding = adding;
//module.exports.pi = pi;


//This is yet another way to do it
var counter = function(arr){
   return 'There are ' + arr.length + ' elements in this array';
};
//The backticks in the return statement are used for templates. You don't have to concatinate
var adding = function(a,b){
   return `Your balance is $ ${a-b}`;
};

var pi = 3.142;

//This is another way to add these properties to module.export - using literal notation
module.exports = {
   counter: counter,
   adding: adding,
   pi: pi
};



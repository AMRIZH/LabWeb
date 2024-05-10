// Example using var
var x = 10;
console.log(x); // Output: 10

// Variable var can be redeclared
var x = 20;
console.log(x); // Output: 20

// Variable var can be reassigned
// Example using let
let y = 50;
console.log(y); // Output: 50

// Variable let can be reassigned
let y = 70;
console.log(y); // Output: 70

// Example using const
const z = 100;
console.log(z); // Output: 100
 
// Variable const cannot be redeclared
const z = 200; // Error: Identifier 'z' has already been declared

// Variable const cannot be reassigned
z = 300; // Error: Assignment to constant variable.

//When to Use var, let, or const?
//1. Always declare variables
//2. Always use const if the value should not be changed
//3. Always use const if the type should not be changed (Arrays and Objects)
//4. Only use let if you can't use const
//5. Only use var if you MUST support old browsers
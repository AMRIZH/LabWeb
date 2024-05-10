// operator dalam javascript
// operator is a symbol that performs an operation on one or more operands.

// 1. Arithmetic Operators
// Arithmetic operators are used to perform arithmetic operations on numbers.
// +	Addition
// -	Subtraction
// *	Multiplication
// /	Division
// %	Modulus
// Example:

var a = 5;
var b = 2;
console.log(a + b); // 7
console.log(a - b); // 3
console.log(a * b); // 10
console.log(a / b); // 2.5
console.log(a % b); // 1
console.log(Math.pow(a, b)); // 25
// 2. Assignment Operators
// Assignment operators are used to assign values to variables.
// =	Assign
// +=	Add and Assign
// -=	Subtract and Assign
// *=	Multiply and Assign
// /=	Divide and Assign
// %=	Modulus and Assign
// Example:

var x = 5;
var y = 2;
x += y; // x = x + y
console.log(x); // 7
x -= y; // x = x - y
console.log(x); // 5
x *= y; // x = x * y
console.log(x); // 10
x /= y; // x = x / y
console.log(x); // 5
x %= y; // x = x % y
console.log(x); // 1
// 3. Comparison Operators
// Comparison operators are used to compare two values.
// ==	Equal
// ===	Strict Equal
// !=	Not Equal
// !==	Strict Not Equal
// >	Greater Than
// <	Less Than
// >=	Greater Than or Equal
// <=	Less Than or Equal
// Example:

var a = 5;
var b = 2;
console.log(a == b); // false
console.log(a === b); // false
console.log(a != b); // true
console.log(a !== b); // true
console.log(a > b); // true
console.log(a < b); // false
console.log(a >= b); // true
console.log(a <= b); // false
// 4. Logical Operators
// Logical operators are used to determine the logic between variables or values.
// &&	Logical AND
// ||	Logical OR
// !	Logical NOT
// Example:

var a = 5;
var b = 2;
console.log(a > 0 && b > 0); // true
console.log(a > 0 || b > 0); // true
console.log(!(a > 0)); // false
// 5. Bitwise Operators
// Bitwise operators are used to perform bitwise operations on binary numbers.
// &	Bitwise AND
// |	Bitwise OR
// ^	Bitwise XOR
// ~	Bitwise NOT
// <<	Left Shift
// >>	Right Shift
// >>>	Zero Fill Right Shift
// Example:

var a = 5; // 101
var b = 2; // 010
console.log(a & b); // 0
console.log(a | b); // 7
console.log(a ^ b); // 7
console.log(~a); // -6
console.log(a << 1); // 10
console.log(a >> 1); // 2
console.log(a >>> 1); // 2
// 6. String Operators
// String operators are used to concatenate strings.
// +	Concatenation
// +=	Concatenation and Assign
// Example:

var str1 = "Hello";
var str2 = "World";
console.log(str1 + " " + str2); // Hello World
str1 += " " + str2; // str1 = str1 + " " + str2
console.log(str1); // Hello World
// 7. Conditional (Ternary) Operator
// Conditional operator is used to assign a value to a variable based on a condition.
// condition ? value1 : value2
// Example:

var age = 20;
var isAdult = age >= 18 ? "Yes" : "No";
console.log(isAdult); // Yes
// 8. Typeof Operator
// Typeof operator is used to get the data type of a variable.
// typeof variable
// Example:

var name = "Teorem";
var age = 20;
var isMale = true;
var height = 1.75;
var weight = 70.5;
console.log(typeof name); // string
console.log(typeof age); // number
console.log(typeof isMale); // boolean
console.log(typeof height); // number
console.log(typeof weight); // number
// 9. instanceof Operator
// Instanceof operator is used to check if an object is an instance of a specific class.
// object instanceof class
// Example:

var fruits = ["Apple", "Banana", "Cherry"];
console.log(fruits instanceof Array); // true
console.log(fruits instanceof Object); // true
// 10. Delete Operator
// Delete operator is used to delete a property from an object.
// delete object.property
// Example:

var person = {
  name: "Teorem",
  age: 20,
  isMale: true,
  height: 1.75,
  weight: 70.5,
};
delete person.age;
console.log(person); // { name: 'Teorem', isMale: true, height: 1.75, weight: 70.5 }



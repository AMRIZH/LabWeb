// JAVASCRIPT BASIC
import math from "./math.js";
// 1. Hello World
console.log("Hello World");

// 2. Variables
var name = "Teorem";
console.log(name);

// 3. Data Types
var age = 20;
var isMale = true;
var height = 1.75;
var weight = 70.5;
console.log(age);
console.log(isMale);
console.log(height);
console.log(weight);

// 4. MATH Operators
var a = 5;
var b = 2;
console.log(a + b);
console.log(a - b);
console.log(a * b);
console.log(a / b);
console.log(a % b);
console.log(Math.pow(a, b));

// 5. String
var str = "Hello World";
console.log(str.length);
console.log(str.toUpperCase());
console.log(str.toLowerCase());
console.log(str.indexOf("World"));
console.log(str.slice(0, 5));
console.log(str.replace("World", "Teorem"));

// 6. Array
var fruits = ["Apple", "Banana", "Cherry"];
console.log(fruits.length);
console.log(fruits[0]);
console.log(fruits[1]);
console.log(fruits[2]);
fruits.push("Durian");
console.log(fruits);
fruits.pop();
console.log(fruits);

// 7. Object
var person = {
  name: "Teorem",
  age: 20,
  isMale: true,
  height: 1.75,
  weight: 70.5,
};
console.log(person.name);
console.log(person.age);
console.log(person.isMale);
console.log(person.height);
console.log(person.weight);



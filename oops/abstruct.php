<?php
/*
Doc link-https://docs.google.com/document/d/1OF1y9Q26TA9YvNblFvOfvpsTc6uDnAU8h9haEMeVCUA/edit
Video link-https://www.youtube.com/watch?v=gw6WT6PufPc
https://www.youtube.com/watch?v=Z-CO3USqEPg
Document link-
Topic-Abstruct class & function
Defination-
What is Abstract Class in PHP?
An abstract class or method is defined with the abstract keyword.
An abstract class is a class that contains at least one abstract method. An abstract method is a method that is declared, but not implemented in the code.
When inheriting from an abstract class, the child class method must be defined with the same name, and the same or a less restricted access modifier.
So, if the abstract method is defined as protected, the child class method must be defined as either protected or public, but not private.
Also, the type and number of required arguments must be the same. However{} the child classes may have optional arguments in addition.
Explation -
Abstract class or method defined hoy abstract keyword diye
abstract classe at least 1ta abstract method j method declared thake not implemented
Jkun inherit kora hobe child class method must be defined with same name and the same or a less restricted access modifier
Abstract method protected hole child class method protected or public hbe not private
Type & number of required arguments must be same ,the child class may have optional argument in addition
Case study-
Class abstract function o + niche use hche sb +new
Class abstract er abs functione body dile error hbe, non abs e nadile
Class abstract er abs functione niche define krte j use krche nahle error ,non abs er jno issue hbena
Class abstract nonabt functione body ache niche body likle overwrite hbe
Others-
Do you think it is important to avoid calling abstract methods in abstract classes?
Interviewers ask this question to assess your proficiency in Java. It allows them to determine how critically you can think when creating Java programs. To present a thoughtful answer, consider focusing on explaining why a user may avoid calling abstract methods in their abstract classes. Also give an example of an issue a user may experience if they call abstract methods.
Example answer: An abstract class may or may not have abstract methods, so it is important for Java users to avoid calling abstract methods in abstract classes. One of the main reasons is that when you call abstract methods, you can create limitations whenever you are implementing those methods. This is because of the initialisation order.

Code practice-
*/
/*Example-*/
/* abstract class with abstract function */

abstract class a {
    abstract public function message1();

    public function message2() {
        echo "Path ";
    }
}

class b extends a {
    public function message1() {
        echo "Programming ";
    }

    public function message2() {
        echo "Channel";
    }
}

$obj = new b();
$obj->message1(); // Output: Programming
$obj->message2(); // Output: Channel

/* abstract class with abstract function */

/* abstract class without abstract function */
//no issue
// abstract class a {
//     public function message1() {
//         echo "Path ";
//     }

//     public function message2() {
//         echo "Path ";
//     }
// }

// class b extends a {
//     public function message1() {
//         echo "Programming ";
//     }

//     public function message2() {
//         echo "Channel";
//     }
// }

// $obj = new b();
// $obj->message1(); // Output: Programming
// $obj->message2(); // Output: Channel
/* abstract class without abstract function */

/*with laravel*/
// app/Shape.php

// namespace App;

// abstract class Shape
// {
//     abstract public function area();

//     abstract public function perimeter();
// }
// ------------
// // app/Circle.php

// namespace App;

// class Circle extends Shape
// {
//     private $radius;

//     public function __construct($radius)
//     {
//         $this->radius = $radius;
//     }

//     public function area()
//     {
//         return pi() * pow($this->radius, 2);
//     }

//     public function perimeter()
//     {
//         return 2 * pi() * $this->radius;
//     }
// }

// -------
// // Example usage in a controller or route

// use App\Circle;

// Route::get('/circle', function () {
//     $circle = new Circle(5);
//     $area = $circle->area();
//     $perimeter = $circle->perimeter();

//     return "Circle Area: $area, Perimeter: $perimeter";
// });
///////////////////////////////////////////////////////

// app > Http > Controllers > AdminLoginController.php > App\Http\Controllers\CreditCard 
// abstract class PaymentMethod {
//     abstract public function processPayment($amount); 
// } 
// class CreditCard extends PaymentMethod {
//     public function processPayment($amount) { 
//     //implementation to process payment using credit card 
// } 
// } 
// class BankTransfer extends PaymentMethod { 
//     public function processPayment($amount) { 
//     //implementation to process payment using bank transfer    
//     }
// }

/*with laravel*/
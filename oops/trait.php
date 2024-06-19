<?php
/*
Topic-Trait
Doc link-https://docs.google.com/document/d/1OF1y9Q26TA9YvNblFvOfvpsTc6uDnAU8h9haEMeVCUA/edit
Video link-https://www.youtube.com/watch?v=Z7M4PLQdIGA
Document link-
Defination-
Traits allow us to develop a reusable piece of code and inject it in controller and modal in a Laravel application.
In general, Traits are nothing but a reusable collection of methods and functions that can be incorporated in any other classes.
Laravel traits are a group of functions that you include within another class. A trait is like an abstract class, you cannot instantiate directly, -but its methods can be used in concreate class.
Explation-
Code Practice-
Example-
Case study-
private static,public,protected,all can all from outside
Others-
*/
/*with laravel*/
// <?php
// /*Create Traits in Laravel
// Create Traits folder in app/Http, then create Traits/TestTrait.php */
// namespace App\Http\Traits;
// //use App\Models\Student;
// trait TestTrait {


// private static function index() {
// // Fetch all the students from the 'student' table. $student Student::all();
// $data['student'] = "test trait !";
// return $data;
// }

// }

// ---
// <?php
// // app/Http/Controllers/TraitsTestController.php

// namespace App\Http\Controllers;

// use App\Http\Traits\TestTrait;
// use App\Http\Controllers\Controller;

// class TraitsTestController extends Controller
// {
//     use TestTrait;

//     public function __construct()
//     {
//         // Middleware, etc.
//     }

//     public function showStudents()
//     {
//         return $this->index(); // Access the index method from the trait
//     }
// }


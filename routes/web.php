<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $featuredCourses = App\Courses::take(3)->latest()->get();
    return view('home', compact('featuredCourses'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/courses', 'CoursesController@index')->name('courses.index');
Route::get('/course/{course}', 'CoursesController@show')->name('course.show');
Route::get('/course/{course}/episodes/{episodeNumber}','CoursesController@episode')->name('course.episode');

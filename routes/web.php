  
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

Route::view('/', 'welcome');
Auth::routes();


//********************************GET********************************
//LoginController
Route::get('/login/teacher', 'Auth\LoginController@showteacherLoginForm')->name('teacher_login_form');
Route::get('/login/student', 'Auth\LoginController@showstudentLoginForm')->name('student_login_form');

//RegisterController
Route::get('/register/teacher', 'Auth\RegisterController@showteacherRegisterForm')->name('teacher_register');
Route::get('/register/student', 'Auth\RegisterSController@showstudentRegisterForm')->name('student_register');

//studentController
Route::get('/s/{the_user_is}', 'studentController@studentdashbord')->name('student_dashboard');

//teacherpostController
Route::get('/teacher/post', 'teacherPostController@teachercreate');
//studentpostController
Route::post('/student/post/m', 'StudentPostController@store');
Route::get('/student/Edit/post/{postid}', 'StudentPostController@showupdate');
Route::post('/student/updatep/{post_info}', 'studentPostController@update');
Route::GET('/student/edit', 'StudentProfileController@show');
Route::post('/student/editP', 'StudentProfileController@store');
Route::get('/student/update', 'StudentProfileController@showupdate');
Route::post('/student/update/p', 'StudentProfileController@update');
//teacherController
Route::post('/teacher/post/m', 'teacherPostController@store');
Route::get('/teacher/Edit/post/{postid}', 'teacherPostController@showupdate');
Route::post('/teacher/updatep/{post_info}', 'teacherPostController@update');
Route::GET('/teacher/edit', 'teacherProfileController@show');
Route::post('/teacher/editP', 'teacherProfileController@store');
Route::get('/teacher/update', 'teacherProfileController@showupdate');
Route::post('/teacher/update/P', 'teacherProfileController@update');
Route::get('/teacher/class', 'teacherclasseController@teachercreate');
Route::post('/teacher/class/m', 'teacherclasseController@store');
Route::get('/teacher/c/{the_class}', 'teacherclasseController@show');
Route::get('/teacher/{the_classe}/file', 'teacherfileController@show');
Route::post('/teacher/file/make', 'teacherfileController@store');
//teacherController
Route::get('/t/{the_user_is}', 'teacherController@teacherdashbord')->name('teacher_dashboard');
//studentController
Route::get('/student/post', 'StudentPostController@studentcreate');



//teacherController
Route::get('/teacher/post/m', 'teacherPostController@store');

//HomeController
Route::get('/home', 'HomeController@index')->name('home');

//********************************get********************************
//LoginController
Route::get('/login/teacher/in', 'Auth\LoginController@teacherLogin')->name('teacher_login');
Route::get('/login/student/in', 'Auth\LoginController@studentLogin')->name('student_login');

//RegisterController                                           
Route::post('/register/teacher/make', 'Auth\RegisterController@createteacher')->name('teacher_create');
Route::post('/register/student/make', 'Auth\RegisterSController@createstudent')->name('student_create');


//following system
Route::get('/followme/{follower}/{following}', 'followsystemcontroller@followme');
Route::get('/unfollowme/{follower}/{following}', 'followsystemcontroller@unfollowme');

Route::get('/followclass/{follower}/{following}', 'followsystemcontroller@followclass');
Route::get('/unfollowclass/{follower}/{following}', 'followsystemcontroller@unfollowclass');


Route::get('/search', 'searchcontroller@search');
Route::get('/search/user', 'searchcontroller@searchuser');

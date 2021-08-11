<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|q
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontendController@index');
// create appointment 
Route::get('/new-appointment/{doctorID}/{date}', 'FrontendController@show')->name('create.appointment');

Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Patient URL Routes
// -----------
Route::group(['middleware' => ['auth','patient']], function() {
    // store user booking
    Route::post('/book/appointment', 'FrontendController@store')->name('book.appointment');
    // get user booking
    Route::get('/my-bookings', 'FrontendController@myBookings')->name('my.booking');
    // get profile for user profile 
    Route::get('/user-profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store')->name('profile.store');
    Route::post('/profile-picture', 'ProfileController@profilePic')->name('profile.pic');
    // get prescriptions for users
    Route::get('/my-prescription', 'FrontendController@myPrescription')->name('my.prescription');
});

// Admin URLs
// -----------
Route::group(['middleware' => ['auth','admin']], function() {
    Route::resource('doctor', 'DoctorController');
    Route::resource('department', 'DepartmentController');  
    Route::get('/patients','PatientlistController@index')->name('patient');
    Route::get('/patients/all','PatientlistController@allTimeAppointment')->name('all.appointments');
    Route::get('/status/update/{id}','PatientlistController@toggleStatus')->name('update.status');
});

// Doctor URLs
// -----------
Route::group(['middleware' => ['auth','doctor']], function() {
    Route::resource('appointment', 'AppointmentController');
    Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');
    Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');
    Route::get('patient-today', 'PrescriptionController@index')->name('patients.today');
    Route::post('/prescription', 'PrescriptionController@store')->name('prescription');
    Route::get('/prescription/{userID}/{date}', 'PrescriptionController@show')->name('prescription.show');
    Route::get('/prescribed-patients', 'PrescriptionController@patientsFromPrescription')->name('prescribed.patients');
});
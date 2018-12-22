<?php

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

Route::get('/', 'SiteController@home');
Route::get('/courses/index', 'SiteController@courses');
Route::get('/branch/courses/{id}', 'SiteController@branch_courses');
Route::get('/courses/search', 'SiteController@search_courses');
Route::get('/about/aou', 'SiteController@about');
Route::get('/contact/aou', 'SiteController@contact');
Route::get('/course/details/{id}', 'SiteController@course_details');
Route::get('/courses/field/{id}', 'SiteController@field_courses');
Route::get('/student/enrolls', 'StudentController@enrolls');
Route::get('/course/apply/{id}', ['uses' => 'StudentController@apply', 'as' => 'course.apply']);
Route::get('/inst/profile/{id}', 'InstructorController@instructor_profile');
Route::post('/message/send', 'SiteController@send_message');
Route::get('/instructor/print/{id}', 'InstructorController@print');
Route::get('/student/print/{id}', 'StudentController@print');
Route::get('/student/cancel/{id}', 'StudentController@cancel');
Route::post('/cors/cancel', 'StudentController@cancelation');

Route::group(['middleware' => 'guest'], function () {
   /*  Route::get('/', 'SiteController@home'); */
    Route::get('student/login', 'StudentController@login')->name('student.login');
    Route::get('admin/login', 'AdminController@login')->name('admin.login');
    Route::get('sadmin/login', 'SadminController@login')->name('sub_admin.login'); 
    Route::get('instructor/login', 'InstructorController@login')->name('instructor.login');
    Route::get('student/register', 'StudentController@register');
    Route::get('instructor/register', 'InstructorController@register');
    Route::post('/check/admin', 'AdminController@check_login')->name('admin.check_login');
    Route::post('/sign/instructor', 'SiteController@sign');
    Route::post('/check/sadmin', 'SadminController@check_login');
    Route::post('/check/student', 'StudentController@check_login');
    Route::post('/check/instructor', 'InstructorController@check_login');
    Route::post('/std/savstd', 'StudentController@save_std');

    Route::get('/site/confirmation/{token}', 'SiteController@confirmation')->name('confirmation');
    Route::get('/resendConfirm/{email}', 'SiteController@resendConfirm');

});

Route::group(['middleware' => 'student:student'], function () {
    Route::any('/student/logout', 'StudentController@logout');
    Route::get('/student/enrolls', 'StudentController@enrolls');
    Route::post('/cors/apply', 'StudentController@apply_course');
    Route::get('/std/profile', 'StudentController@edit_profile');
    Route::get('/std/profile/{id}', 'StudentController@my_profile')->name('student.profile');
    Route::post('/std/editstd', 'StudentController@update_profile');
});

Route::group(['middleware' => 'admin:admin'], function () {
     Route::get('/adashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('/sstd/profile/{id}', 'AdminController@student_profile');
    Route::any('/admin/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/admin/requests', 'AdminController@admin_requests');
    Route::get('/sign/requests', 'AdminController@signs');
    Route::get('/sign/resume/{id}', 'AdminController@resume');
    Route::get('/invoices/all', 'AdminController@invoices');
    Route::get('/sign/accept/{id}', 'AdminController@accept_sign');
    Route::get('/sign/refuse/{id}', 'AdminController@refuse_sign');
    Route::get('/admin/accept/{id}', 'AdminController@accept');
    Route::get('/admin/refuse/{id}', 'AdminController@refuse');
    Route::get('/course/applicants/{id}', 'AdminController@applicants');
    Route::get('/admin/messages', 'AdminController@messages');
    Route::get('/admin/branches', 'AdminController@admin_branches');
    Route::get('/admin/sub', 'AdminController@admin_sub_admins');
    Route::get('/admin/subedit/{id}', 'AdminController@edit_sub');
    Route::get('/admin/brnedit/{id}', 'AdminController@edit_brn');
    Route::get('/admin/addbrn', 'AdminController@add_brn');
    Route::get('/admin/addsub', 'AdminController@add_sub');
    Route::get('/admin/delbrn/{id}', 'AdminController@del_brn');
    Route::get('/admin/delsub/{id}', 'AdminController@del_sub');
    Route::post('/admin/savbrn', 'AdminController@save_brn');
    Route::post('/admin/savsub', 'AdminController@save_sub');
    Route::post('/admin/editbrn', 'AdminController@ed_brn');
    Route::post('/admin/editsub', 'AdminController@ed_sub');
    Route::get('/admin/profile/{id}', 'AdminController@admin_profile')->name('admin.profile');
    Route::get('/admin/profile', 'AdminController@edit_profile');
    Route::post('/admin/editprofile', 'AdminController@update_profile');
    Route::get('/sub/profile/{id}', 'AdminController@sub_profile');
    Route::get('/admin/instructors', 'AdminController@admin_instructors');
    Route::get('/admin/instedit/{id}', 'AdminController@edit_inst');
    Route::get('/admin/addinst', 'AdminController@add_inst');
    Route::get('/admin/delinst/{id}', 'AdminController@del_inst');
    Route::post('/admin/savinst', 'AdminController@save_inst');
    Route::post('/admin/editinst', 'AdminController@ed_inst');
    Route::get('/ainstructor/profile/{id}', 'AdminController@show_instructor');
    Route::get('/inv/accept/{id}', 'InstructorController@accept');
    Route::get('/inv/refuse/{id}', 'InstructorController@refuse');
});

Route::group(['middleware' => 'sadmin:subadmin'], function () {
    Route::get('/sdashboard', 'SadminController@index')->name('sub_admin.dashboard');
    Route::any('/sadmin/logout', 'SadminController@logout')->name('sadmin.logout');
    Route::get('/sadmin/requests', 'SadminController@sadmin_requests');
    Route::get('/sadmin/accept/{id}', 'SadminController@accept');
    Route::get('/sadmin/refuse/{id}', 'SadminController@refuse');
    Route::get('/sadmin/profile', 'SadminController@edit_profile');
    Route::post('/sadmin/editbrn', 'AdminController@ed_brn');
    Route::post('/sadmin/editprofile', 'SadminController@update_profile');
    Route::get('/sadmin/profile/{id}', 'SadminController@sadmin_profile');
    Route::get('/sadmin/students', 'SadminController@sadmin_students');
    Route::get('/sadmin/stdedit/{id}', 'SadminController@edit_std');
    Route::get('/sadmin/addstd', 'SadminController@add_std');
    Route::get('/sadmin/delstd/{id}', 'SadminController@del_std');
    Route::post('/sadmin/savstd', 'SadminController@save_std');
    Route::post('/sadmin/editstd', 'SadminController@ed_std');
    Route::get('/sadmin/instructors', 'SadminController@show_instructors');
    Route::get('/sadmin/instedit/{id}', 'AdminController@edit_inst');
    Route::get('/sadmin/addinst', 'AdminController@add_inst');
    Route::get('/sadmin/delinst/{id}', 'AdminController@del_inst');
    Route::post('/sadmin/savinst', 'AdminController@save_inst');
    Route::post('/sadmin/editinst', 'AdminController@ed_inst');
    Route::get('/student/profile/{id}', 'SadminController@student_profile');
    Route::get('/sinstructor/profile/{id}', 'InstructorController@my_profile');

     Route::get('/admin/brnedit1/{id}', 'SadminController@edit_brn');
    /* Route::get('/student/enrolls', 'SadminController@enrolls'); */
  });

Route::group(['middleware' => 'instructor:instructor'], function () {
    Route::any('/instructor/logout', 'InstructorController@logout');
    Route::get('/add/course', 'InstructorController@add_course');
    Route::post('/save/course', 'InstructorController@save_course');
    Route::get('/instructor/enrolls', 'InstructorController@enrolls');
    Route::get('/instructor/accept/{id}', 'InstructorController@accept');
    Route::get('/instructor/refuse/{id}', 'InstructorController@refuse');
    Route::get('/instructor/profile', 'InstructorController@edit_profile');
    Route::post('/instructor/editprofile', 'InstructorController@update_profile');
    Route::get('/instructor/profile/{id}', 'InstructorController@my_profile');
    Route::get('/course/edit/{id}', 'InstructorController@edit_course');
    Route::post('/edit/course', 'InstructorController@update_course');
    Route::get('/course/delete/{id}', 'InstructorController@delete_course');
    Route::get('/instr/students', 'SadminController@sadmin_students');
    Route::get('/instr/stdedit/{id}', 'SadminController@edit_std');
    Route::get('/instr/addstd', 'SadminController@add_std');
    Route::get('/instr/delstd/{id}', 'SadminController@del_std');
    Route::post('/instr/savstd', 'SadminController@save_std');
    Route::post('/instr/editstd', 'SadminController@ed_std');
    Route::get('/istudent/profile/{id}', 'SadminController@student_profile');
    Route::get('/instructor/courses/{id}', 'InstructorController@my_courses');

});

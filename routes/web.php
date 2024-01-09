<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Setup\DesignationController;

use App\Http\Controllers\Backend\Student\StudentRegController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});


Route::controller(AdminController::class)->group(function (){
    Route::get('admin/logout', 'Logout')->name('admin.logout');
});



// Start User Prefix
Route::prefix('users')->group(function (){
    
        // Route::get('/user/view', [UserController::class, 'UserView'])->name('user.view');
    Route::controller(UserController::class)->group(function (){
        Route::get('view', 'UserView')->name('user.view')->middleware('auth');
        Route::get('add', 'UserAdd')->name('user.add')->middleware('auth');
        Route::post('store', 'UserStore')->name('user.store')->middleware('auth');
        Route::get('edit/{id}', 'UserEdit')->name('user.edit')->middleware('auth');
        Route::post('update/{id}', 'UserUpdate')->name('user.update')->middleware('auth');
        Route::get('delete/{id}', 'UserDelete')->name('user.delete')->middleware('auth');
    });

}); // End User Prefix


Route::prefix('profile')->group(function (){
    
        // Route::get('/user/view', [UserController::class, 'UserView'])->name('user.view');
    Route::controller(ProfileController::class)->group(function (){
        Route::get('view', 'ProfileView')->name('profile.view')->middleware('auth');
        Route::get('edit', 'ProfileEdit')->name('profile.edit')->middleware('auth');
        Route::post('update', 'ProfileUpdate')->name('profile.update')->middleware('auth');
        Route::get('password/change', 'PasswordChange')->name('password.change')->middleware('auth');
        Route::post('password/update', 'PasswordUpdate')->name('password.update')->middleware('auth');
    });

}); // End Profile Prefix


// Start Setup Prefix
Route::prefix('setups')->group(function (){
    
        // Route::get('/user/view', [UserController::class, 'UserView'])->name('user.view');
    Route::controller(StudentClassController::class)->group(function (){

        // Student Class
        Route::get('student/class/view', 'ViewStudentClass')->name('student.class.view')->middleware('auth');
        Route::get('student/class/add', 'AddStudentClass')->name('student.class.add')->middleware('auth');
        Route::post('store/student/class', 'StoreStudentClass')->name('store.student.class')->middleware('auth');
        Route::get('student/class/edit/{id}', 'StudentClassEdit')->name('student.class.edit')->middleware('auth');
        Route::post('student/class/update', 'StudentClassUpdate')->name('student.class.update')->middleware('auth');
        Route::get('student/class/delete/{id}', 'StudentClassDelete')->name('student.class.delete')->middleware('auth');
    });

    Route::controller(StudentYearController::class)->group(function (){

        // Student Year
        Route::get('student/year/view', 'ViewYear')->name('student.year.view')->middleware('auth');
        Route::get('student/year/add', 'AddYear')->name('student.year.add')->middleware('auth');
        Route::post('store/student/year', 'StoreStudentYear')->name('store.student.year')->middleware('auth');
        Route::get('student/year/edit/{id}', 'YearEdit')->name('student.year.edit')->middleware('auth');
        Route::post('student/year/update', 'YearUpdate')->name('student.year.update')->middleware('auth');
        Route::get('student/year/delete/{id}', 'YearDelete')->name('student.year.delete')->middleware('auth');
    });

    Route::controller(StudentGroupController::class)->group(function (){

        // Student Group
        Route::get('student/group/view', 'ViewGroup')->name('student.group.view')->middleware('auth');
        Route::get('student/group/add', 'AddGroup')->name('student.group.add')->middleware('auth');
        Route::post('store/student/group', 'StoreStudentGroup')->name('store.student.group')->middleware('auth');
        Route::get('student/group/edit/{id}', 'StudentGroupEdit')->name('student.group.edit')->middleware('auth');
        Route::post('student/group/update/{id}', 'StudentGroupUpdate')->name('student.group.update')->middleware('auth');
        Route::get('student/group/delete/{id}', 'StudentGroupDelete')->name('student.group.delete')->middleware('auth');
    });

    Route::controller(StudentShiftController::class)->group(function (){

        // Student Shift
        Route::get('student/shift/view', 'ViewShift')->name('student.shift.view')->middleware('auth');
        Route::get('student/shift/add', 'StudentShiftAdd')->name('student.shift.add')->middleware('auth');
        Route::post('store/student/shift', 'StoreStudentShift')->name('store.student.shift')->middleware('auth');
        Route::get('student/shift/edit/{id}', 'StudentShiftEdit')->name('student.shift.edit')->middleware('auth');
        Route::post('student/shift/update/{id}', 'StudentShiftUpdate')->name('student.shift.update')->middleware('auth');
        Route::get('student/shift/delete/{id}', 'StudentShiftDelete')->name('student.shift.delete')->middleware('auth');
    });

    Route::controller(FeeCategoryController::class)->group(function (){

        // Student Shift
        Route::get('fee/category/view', 'ViewFeeCat')->name('fee.category.view')->middleware('auth');
        Route::get('fee/category/add', 'FeeCatAdd')->name('fee.category.add')->middleware('auth');
        Route::post('store/fee/category', 'StoreFeeCategory')->name('store.fee.category')->middleware('auth');
        Route::get('fee/category/edit/{id}', 'FeeCatEdit')->name('fee.category.edit')->middleware('auth');
        Route::post('fee/category/update/{id}', 'FeeCategoryUpdate')->name('fee.category.update')->middleware('auth');
        Route::get('fee/category/delete/{id}', 'FeeCategoryDelete')->name('fee.category.delete')->middleware('auth');
        
    });

    Route::controller(FeeAmountController::class)->group(function (){

        // Student Shift
        Route::get('fee/amount/view', 'ViewFeeAmount')->name('fee.amount.view')->middleware('auth');
        Route::get('fee/amount/add', 'FeeAmountAdd')->name('fee.amount.add')->middleware('auth');
        Route::post('store/fee/amount', 'StoreFeeAmount')->name('store.fee.amount')->middleware('auth');
        Route::get('fee/amount/edit/{fee_category_id}', 'FeeAmountEdit')->name('fee.amount.edit')->middleware('auth');
        Route::post('fee/amount/update/{fee_category_id}', 'FeeAmountUpdate')->name('update.fee.amount')->middleware('auth');
        Route::get('fee/amount/details/{fee_category_id}', 'FeeAmountDetails')->name('fee.amount.details')->middleware('auth');
        
    });

    Route::controller(ExamTypeController::class)->group(function (){

        // Exam Type
        Route::get('exam/type/view', 'ViewExamType')->name('exam.type.view')->middleware('auth');
        Route::get('exam/type/add', 'ExamTypeAdd')->name('exam.type.add')->middleware('auth');
        Route::post('store/exam/type', 'StoreExamType')->name('store.exam.type')->middleware('auth');
        Route::get('exam/type/edit/{id}', 'ExamTypeEdit')->name('exam.type.edit')->middleware('auth');
        Route::post('exam/type/update/{id}', 'ExamTypeUpdate')->name('update.exam.type')->middleware('auth');
        Route::get('exam/type/delete/{id}', 'ExamTypeDelete')->name('exam.type.delete')->middleware('auth');
        
    });

    Route::controller(SubjectController::class)->group(function (){

        // School Subject
        Route::get('subject/view', 'ViewSubject')->name('subject.view')->middleware('auth');
        Route::get('subject/add', 'SubjectAdd')->name('subject.add')->middleware('auth');
        Route::post('store/subject', 'StoreSubject')->name('store.subject')->middleware('auth');
        Route::get('subject/edit/{id}', 'SubjectEdit')->name('subject.edit')->middleware('auth');
        Route::post('subject/update/{id}', 'SubjectUpdate')->name('subject.update')->middleware('auth');
        Route::get('subject/delete/{id}', 'SubjectDelete')->name('subject.delete')->middleware('auth');
        
    });

    Route::controller(AssignSubjectController::class)->group(function (){

        // Assign Subject Route
        Route::get('assign/subject/view', 'ViewAssignSubject')->name('assign.subject.view')->middleware('auth');
        Route::get('assign/subject/add', 'AddAssignSubject')->name('assign.subject.add')->middleware('auth');
        Route::post('store/assign/subject', 'StoreAssignSubject')->name('store.assign.subject')->middleware('auth');
        Route::get('assign/subject/edit/{class_id}', 'AssignSubjectEdit')->name('assign.subject.edit')->middleware('auth');
        Route::post('assign/subject/update/{class_id}', 'AssignSubjectUpdate')->name('update.assign.subject')->middleware('auth');
        Route::get('assign/subject/details/{class_id}', 'AssignSubjectDetails')->name('assign.subject.details')->middleware('auth');
        
    });

    Route::controller(DesignationController::class)->group(function (){

        // Designation Route
        Route::get('designation/view', 'ViewDesignation')->name('designation.view')->middleware('auth');
        Route::get('designation/add', 'AddDesignation')->name('designation.add')->middleware('auth');
        Route::post('store/designation', 'StoreDesignation')->name('store.designation')->middleware('auth');
        Route::get('designation/edit/{id}', 'DesignationEdit')->name('designation.edit')->middleware('auth');
        Route::post('designation/update/{id}', 'DesignationUpdate')->name('update.designation')->middleware('auth');
        Route::get('designation/delete/{id}', 'DesignationDelete')->name('designation.delete')->middleware('auth');

        
    });

}); // End Setup Prefix


// Student Prefix
Route::prefix('students')->group(function (){
    
        // Route::get('/user/view', [UserController::class, 'UserView'])->name('user.view');
    Route::controller(StudentRegController::class)->group(function (){
        Route::get('reg/view', 'StudentRegView')->name('student.registration.view')->middleware('auth');
        Route::get('student/reg/add', 'StudentRegAdd')->name('student.reg.add')->middleware('auth');
        Route::post('store/student/reg', 'StoreStudentReg')->name('store.student.reg')->middleware('auth');
        Route::get('year/class/filter', 'StudentClassYearFilter')->name('student.year.class.filter')->middleware('auth');
        Route::get('reg/edit/{student_id}/{year_id}', 'StudentRegEdit')->name('student.registration.edit')->middleware('auth');
        Route::post('reg/update/{student_id}', 'StudentRegUpdate')->name('student.registration.update')->middleware('auth');
        Route::get('edit/promotion/{student_id}', 'StudentEditPromotion')->name('student.registration.promotion')->middleware('auth');
        Route::post('update/promotion/{student_id}', 'StudentUpdatePromotion')->name('student.update.promotion')->middleware('auth');
        Route::get('reg/details/{student_id}', 'StudentRegDetails')->name('student.registration.details')->middleware('auth');
    });

}); // End Student Prefix



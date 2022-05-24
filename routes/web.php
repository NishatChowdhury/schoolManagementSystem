<?php

use App\AcademicClass;
use App\ExamResult;
use App\Grade;
use App\Http\Controllers\FeeSetupController;
use App\Mark;
use App\RawAttendance;
use App\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

/** Dashboard Routes */
Route::get('dashboard','DashboardController@index');

// Routes For ADMIN LTE Alpha END........//


Auth::routes(['register' => false]);
Route::get('/home', 'DashboardController@index')->name('home');

/** User Routes start */
Route::get('user/profile','UserController@profile');
Route::patch('user/update','UserController@update');
Route::patch('user/password','UserController@password');
/** User Routes end */

/*
  ==== Route for Front-End Menu Bar Start ==== @MKH
 */
Route::get('/', 'FrontController@index');
//Route::get('/', 'IdCardController@custom_staffPdf');

//Route::get('{uri}','FrontController@page');
Route::get('{uri}','FrontController@page');

//Institute -> About
Route::get('/introduction','FrontController@introduction');
Route::get('/governing-body','FrontController@governing_body');
Route::get('/founder-n-donor','FrontController@donor');

//Institute -> Administrative message
Route::get('/president','FrontController@president');
Route::get('/principal','FrontController@principal');

//Institute-> Infrastructure
Route::get('/building-room','FrontController@building_room');
Route::get('/library','FrontController@library');
Route::get('/transport','FrontController@transport');
Route::get('/hostel','FrontController@hostel');
Route::get('/land-information','FrontController@land_information');

//Institute -> Academic
Route::get('/class-routine','FrontController@class_routine');
Route::get('/calender','FrontController@calender');
Route::get('/syllabus','FrontController@syllabus');
Route::get('/diary','FrontController@diary');
Route::get('/performance','FrontController@performance');
Route::get('/holiday','FrontController@holiday');

//Institute -> Digital Campus
Route::get('/multimedia-classroom','FrontController@multimedia_classroom');
Route::get('/computer-lab','FrontController@computer_lab');
Route::get('/science-lab','FrontController@science_lab');

//TEAM
Route::get('/managing-committee','FrontController@managing_committee');
Route::get('/teacher','FrontController@teacher');
Route::get('/staff','FrontController@staff');
Route::get('/wapc','FrontController@wapc');
Route::get('/tswt','FrontController@tswt');
Route::get('/tci','FrontController@tci');

//Result  (Front-End)
Route::get('/internal-exam','FrontController@internal_exam');
Route::get('/public-exam','FrontController@public_exam');
Route::get('/admission','FrontController@admission');

//INFORMATION
Route::get('/sports-n-culture-program','FrontController@sports_n_culture_program');
Route::get('/center-information','FrontController@center_information');
Route::get('/scholarship-info','FrontController@scholarship_info');
Route::get('/bncc','FrontController@bncc');
Route::get('/scout','FrontController@scout');
Route::get('/tender','FrontController@tender');

//Attendance
Route::get('/attendance-summery','FrontController@attendance_summery');
Route::get('/student-attendance','FrontController@student_attendance');
Route::get('/teacher-attendance','FrontController@teacher_attendance');

//News & Notice
Route::get('/notice','FrontController@notice');
Route::get('/notice-details/{id}','FrontController@noticeDetails');
Route::get('/news','FrontController@news');
Route::get('/news-details/{id}','FrontController@newsDetails');

//Gallery
Route::get('/gallery','FrontController@gallery');
Route::get('/album/{name}','FrontController@album');

//Download
Route::get('/download','FrontController@download');

//Contact
Route::get('/contact','FrontController@contact');
/*===== Route for Front-End Menu Bar END ====*/

//Admission Route by Rimon
Route::get('admission/exams','AdmissionController@admissionExams')->name('admission.exams');
Route::get('admission/applicant','AdmissionController@admissionApplicant')->name('admission.applicant');
Route::get('admission/examResult','AdmissionController@admissionExamResult')->name('admission.examResult');
Route::get('admission/browse-merit-list','AdmissionController@browseMeritList');
Route::get('admission/upload-merit-list','AdmissionController@uploadMeritList');
Route::post('admission/upload','AdmissionController@upload');

Route::post('admission/slip-view','AdmissionController@slipView');
//End Admission Route

//Attendance Route by Rimon
Route::get('attendance','AttendanceController@index')->name('custom.view');
Route::get('attendance/dashboard','AttendanceController@dashboard')->name('attendance.dashboard');
Route::get('attendance/student','AttendanceController@student')->name('attendance.student');
Route::get('attendance/teacher','AttendanceController@teacher')->name('attendance.teacher');
Route::get('attendance/report','AttendanceController@report')->name('attendance.report');
Route::post('/get_attendance_monthly', 'AttendanceController@getAttendanceMonthly');
Route::post('/indStudentAttendance','AttendanceController@individulAttendance')->name('student.indAttendance');
Route::post('/classStudentAttendance','AttendanceController@classAttendance')->name('student.classAttendance');
Route::post('/indTeacherAttendance','AttendanceController@individualTeacherAttendance')->name('teacher.indAttendance');
//End Attendance Route

//Exam Route Start  by Rimon
Route::get('exam/gradesystem','ExamController@gradesystem')->name('exam.gradesystem');
//Grading System @MKH
Route::post('exam/store-grade', 'ExamController@store_grade');
Route::get('exam/delete-grade/{id}', 'ExamController@delete_grade');
Route::get('exam/examination','ExamController@examination')->name('exam.examination');
Route::post('exam/sotre-exam', 'ExamController@store_exam')->name('store.exam');
Route::delete('exam/destroy/{id}', 'ExamController@destroy');
Route::get('exam/examitems','ExamController@examitems')->name('exam.examitems');
Route::get('exam/schedule/create/{exam}','ExamScheduleController@create');
Route::post('exam/schedule/store','ExamScheduleController@store');
Route::get('exam/schedule/{examId}', 'ExamController@schedule');
Route::post('exam/store-schedule', 'ExamController@store_schedule');
Route::get('exam/admit-card','ExamController@admitCard');
Route::get('exam/seat-allocate','ExamController@seatAllocate');

// Exam Seat Plan Start
Route::get('exam/seat-plan/{examId}','ExamSeatPlanController@seatPlan');
Route::post('exam/check-roll','ExamSeatPlanController@CheckRoll');
Route::post('exam/store-seat-plan','ExamSeatPlanController@storeSeatPlan');
Route::get('exam/pdf-seat-plan/{id}','ExamSeatPlanController@pdfSeatPlan');
Route::delete('exam/destroy-seat-plan/{id}','ExamSeatPlanController@destroy');

// Exam Seat Plan End

Route::get('exam/result-details/{id}','ResultController@resultDetails');
Route::get('exam/final-result-details/{id}','ResultController@finalResultDetails');
Route::get('exam/result-details-all','ResultController@allDetails');
Route::get('exam/examresult','ResultController@index')->name('exam.examresult');
Route::get('exam/tabulation/{examID}','ResultController@tabulation');
Route::get('exam/generate-exam-result/{examID}','ResultController@generateResult');

Route::get('exam/setfinalresultrule','ResultController@setfinalresultrule')->name('exam.setfinalresultrule');
Route::get('exam/getfinalresultrule','ResultController@getfinalresultrule')->name('exam.getfinalresultrule');
Route::post('exam/final-result','ResultController@finalResultNew');

Route::get('exam/marks/{schedule}','MarkController@index');
Route::get('exam/mark/download/{schedule}','MarkController@download');
Route::get('exam/mark/upload/{schedule}','MarkController@upload');
Route::post('exam/mark/up','MarkController@up');
Route::post('exam/mark/store','MarkController@store');

Route::get('exam/tabulationSheet','ExamController@tabulationSheet')->name('exam.tabulationSheet');
//Exam management End

//Communication Route by Rimon
Route::get('communication/quick','CommunicationController@quick')->name('communication.quick');
Route::get('communication/student','CommunicationController@student')->name('communication.student');
Route::get('communication/staff','CommunicationController@staff')->name('communication.staff');
Route::get('communication/history','CommunicationController@history')->name('communication.history');

Route::post('communication/send','CommunicationController@send');
Route::post('communication/quick/send','CommunicationController@quickSend');
//End Communication Route

Route::get('attendance/setting','ShiftController@index');
Route::post('attendance/shift/store','ShiftController@store');
Route::delete('attendance/shift/delete/{id}','ShiftController@destroy');




//Settings Route by Rimon
Route::get('settings/basicInfo','SettingsController@basicInfo')->name('settings.basicInfo');
//Route::get('settings/notice','SettingsController@notice')->name('settings.notice');
//Route::get('settings/slider','SettingsController@slider')->name('settings.slider');
//Route::get('settings/configuredPage','SettingsController@configuredPage')->name('settings.configuredPage');
//End Settings Route

//Staff Route by Rimon
Route::get('staff/teacher','StaffController@teacher')->name('staff.teacher');
Route::get('staff/staffadd','StaffController@addstaff')->name('staff.addstaff');
Route::post('staff/store-staff','StaffController@store_staff');
Route::get('staff/edit-staff/{id}','StaffController@edit_staff');
Route::patch('staff/{id}/update-staff','StaffController@update_staff');
Route::get('staff/delete-staff/{id}','StaffController@delete_staff');
Route::get('staff/threshold','StaffController@threshold')->name('staff.threshold');
Route::get('staff/kpi','StaffController@kpi')->name('staff.kpi');
Route::get('staff/payslip','StaffController@payslip')->name('staff.payslip');

//End Staff Route

//Institution Mgnt Route by Rimon
//Session @MKH
Route::get('institution/academicyear','InstitutionController@academicyear')->name('institution.academicyear');
Route::post('institution/store-session', 'InstitutionController@store_session');
Route::post('institution/edit-session', 'InstitutionController@edit_session');
Route::post('institution/update-session', 'InstitutionController@update_session');
Route::get('institution/{id}/delete-session', 'InstitutionController@delete_session');
Route::patch('institution/status/{id}','InstitutionController@sessionStatus');

//Academic Classes $ Groups
Route::get('institution/section-groups','InstitutionController@section_group')->name('section.group');
Route::post('institution/create-section', 'InstitutionController@create_section');
Route::post('institution/edit-section', 'InstitutionController@edit_section');
Route::post('institution/update-section', 'InstitutionController@update_section');
Route::get('institution/{id}/delete-section', 'InstitutionController@delete_section');

Route::post('institution/create-group', 'InstitutionController@create_group');
Route::post('institution/edit-group', 'InstitutionController@edit_group');
Route::post('institution/update-group', 'InstitutionController@update_group');
Route::get('institution/{id}/delete-group', 'InstitutionController@delete_grp');

//Session-Class
Route::get('institution/class','InstitutionController@classes')->name('institution.classes');
Route::post('institution/store-class','InstitutionController@store_class');
Route::get('institution/academic-class','InstitutionController@academicClasses')->name('institution.academicClasses');
Route::post('institution/store-academic-class','InstitutionController@storeAcademicClass');
Route::post('institution/edit-AcademicClass','InstitutionController@editAcademicClass');
Route::post('institution/update-AcademicClass','InstitutionController@updateAcademicClass');
Route::post('institution/edit-SessionClass','InstitutionController@edit_SessionClass');
Route::post('institution/update-SessionClass','InstitutionController@update_SessionClass');
Route::get('institution/{id}/delete-SessionClass','InstitutionController@delete_SessionClass');

Route::get('institution/class/subject/{class}','InstitutionController@classSubjects');
Route::delete('institution/class/subject/destroy/{id}','InstitutionController@unAssignSubject');

//Class Schedule
Route::get('institution/class/schedule/{class}','ScheduleController@index');
Route::post('institution/class/schedule/store','ScheduleController@store');

//Subjects
Route::get('institution/subjects','InstitutionController@subjects')->name('institution.subjects');
Route::post('institution/create-subject','InstitutionController@create_subject');
Route::post('institution/edit-subject','InstitutionController@edit_subject');
Route::post('institution/update-subject','InstitutionController@update_subject');
Route::get('institution/{id}/delete-subject','InstitutionController@delete_subject');

//Route::get('institution/classsubjects','InstitutionController@classsubjects')->name('institution.classsubjects');
Route::post('institution/assign-subject','InstitutionController@assign_subject')->name('assign.subject');
//Route::post('institution/assign-subject','InstitutionController@assign_subject')->name('assign.subject');
Route::post('institution/edit-assigned-subject','InstitutionController@edit_assigned')->name('edit.assign');
Route::get('institution/{id}/delete-assigned-subject','InstitutionController@delete_assigned');
Route::get('institution/profile','InstitutionController@profile')->name('institution.profile');

Route::get('institution/signature','InstitutionController@signature');
Route::post('institution/sig','InstitutionController@sig');



//Students Route by babu


//Students Route by Rimon
    Route::get('student/designStudentCard','IdCardController@index');
    Route::get('student/testimonial','StudentController@testimonial')->name('student.testimonial');

    Route::get('student/download-blank-csv/{academicClassId}','StudentController@downloadBlank');
    Route::get('student/upload-student/{academicClassId}','StudentController@uploadStudent');
    Route::post('student/up','StudentController@up');

    Route::get('staff/idCard','IdCardController@staff');
    Route::post('staff/idCard/pdf','IdCardController@staffPdf');

//@MKH
    Route::post('student/store', 'StudentController@store');
    Route::get('student/optional','StudentController@optional');
    Route::post('student/optional/assign','StudentController@assignOptional');
//End Students Route

// ID Card Routes
    Route::post('student/card/pdf','IdCardController@pdf');
// ID Card Routes

// Important Links
    Route::get('settings/links','LinkController@index');
    Route::post('settings/link/store','LinkController@store');
    Route::delete('settings/link/delete/{id}','LinkController@destroy');
// End Important Links

//Account Section Star AR Babu
//  Fee Category Start
    Route::get('/fee-category/index','FeeCategoryController@index')->name('fee-category.index');
    Route::post('fee-category/store','FeeCategoryController@store_fee_category')->name('fee-category.store');
    Route::post('fee-category/edit','FeeCategoryController@edit_fee_category')->name('fee-category.edit');
    Route::post('fee-category/update','FeeCategoryController@update_fee_category')->name('fee-category.update');
    Route::get('fee-category/{id}/delete','FeeCategoryController@delete_fee_category')->name('fee-category.delete');
    Route::put('fee-category/status/{id}','FeeCategoryController@status')->name('fee-category.status');
//    Fee Category End

//  Fee Setup Start
    Route::get('fee-category/fee_setup/{classId}','FeeCategoryController@fee_setup')->name('fee-setup.fee_setup');
    Route::post('fee_setup/store/{classId}','FeeCategoryController@store_fee_setup')->name('fee-setup.store');
    Route::get('fee_setup/list/{classId}','FeeCategoryController@list_fee_setup')->name('fee-setup.list');
    Route::get('fee_setup/show/{id}', 'FeeCategoryController@show_fee_setup')->name('fee-setup.show');
    Route::patch('fee_setup/{id}/update','FeeCategoryController@update_fee_setup')->name('fee-setup.update');
//  Fee Setup End

// Student Transport management Start
    Route::get('fee-category/transport','TransportController@index')->name('transport.index');
    Route::post('fee-category/transport','TransportController@store')->name('transport.store');
    Route::post('fee-category/transport','TransportController@store')->name('transport.store');
    Route::get('transport/edit/{id}','TransportController@edit')->name('transport.edit');
    Route::patch('transport/update/{id}','TransportController@update')->name('transport.update');
    Route::get('transport/student-list','TransportController@student_list')->name('transport.student-list');
    Route::post('transport/assign','TransportController@transport_assign')->name('transport.assign');
// Student Transport management End

// Student Fee Collection start
    Route::get('student/fee','FinanceController@index')->name('student.fee');
    Route::post('student/fee-store','FinanceController@store_payment')->name('student.fee-store');
    Route::get('student/fee-invoice/{id}','FinanceController@fee_invoice')->name('student.fee-invoice');
// Student Fee Collection End

// Student Fee Collection Report Start
    Route::get('report/student-fee-report','ReportController@student_fee_report')->name('report.student-fee');
    Route::get('report/student-monthly-fee-report','ReportController@student_monthly_fee_report')->name('report.student-monthly-fee');
// Student Fee Collection Report End

//Account Section End

//Syllabus Section Start A R Babu
//    Route::get('syllabuses','SyllabusController@index')->name('syllabus.index');
//    Route::post('syllabus/store','SyllabusController@store')->name('syllabus.store');
//    Route::get('syllabus/delete/{id}','SyllabusController@destroy')->name('syllabus.delete');
//Syllabus Section End

//Contact page start
    Route::get('message-index','MessagesController@index')->name('message.index');
    Route::delete('message-delete/{id}','MessagesController@destroy')->name('message.destroy');
    Route::post('message-view','MessagesController@view')->name('message.view');
    Route::post('message-store','MessagesController@store')->name('message.store');
//Contact Page end
//Academic Calender Start
    Route::get('academic-calender/index','AcademicCalenderController@index')->name('academic-calender.index');
    Route::post('academic-calender/store','AcademicCalenderController@store')->name('academic-calender.store');
    Route::post('academic-calender/edit','AcademicCalenderController@edit')->name('academic-calender.edit');
    Route::post('academic-calender/update','AcademicCalenderController@update')->name('academic-calender.update');
    Route::delete('academic-calender/{id}','AcademicCalenderController@destroy')->name('academic-calender.delete');
    Route::put('academic-calender/status/{id}','AcademicCalenderController@status')->name('academic-calender.status');
//Academic Calender End

//Student profile start
    Route::get('admin/student-profile/{studentId}','StudentController@studentProfile')->name('admin.student.profile');
    Route::get('staff-profile/{staffId}','StaffController@staffProfile')->name('staff.profile');
//Student profile end




/** Route for Apps start */
Route::post('api/login','AndroidController@login');

Route::post('api/system-info','AndroidController@systemInfo');
Route::post('api/attendance','AndroidController@attendance');
Route::post('api/about','AndroidController@about');
Route::post('api/president','AndroidController@president');
Route::post('api/profile','AndroidController@profile');
Route::post('api/teachers','AndroidController@teachers');
Route::post('api/syllabus','AndroidController@syllabus');
Route::post('api/notices','AndroidController@notices');
Route::post('api/class-routines','AndroidController@classRoutine');
/** Route for Apps end */

/** Online Admission Starts */
Route::get('validate-admission','FrontController@validateAdmission');
Route::get('admission-form','FrontController@admissionForm');
//Route::post('admission-form-submit','FrontController@admissionFormSubmit');
Route::get('student-form','FrontController@studentForm');
Route::get('admission-invoice','FrontController@invoice');
Route::get('admission-bank-slip','FrontController@bankSlip');
Route::get('admission-success','FrontController@admissionSuccess');
/** Online Admission Ends */

/** Event Start */
Route::get('events','FrontController@events');
Route::get('event/{id}','FrontController@event');
/** Event Ends */

/** Playlist Start */
Route::get('playlists','FrontController@playlists');
Route::get('playlist/{id}','FrontController@playlist');
/** Playlist Ends */

/** Applied Student */
Route::post('admission-form-submit','AppliedStudentController@store');
Route::post('load_applied_student_id','AppliedStudentController@loadStudentId');
/** Applied Student */



//if(isMenu()){
//    Route::get('{uri}','FrontController@page');
//}

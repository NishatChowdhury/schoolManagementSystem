<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeeCartController;
use App\Http\Controllers\FeeSetupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeeCollectionController;

Route::group(['prefix'=>'admin'],function(){

    Route::get('/',[DashboardController::class,'index'])->name('admin');
    Route::get('backup',[DashboardController::class,'backup'])->name('admin.backup');

    Route::get('transactions','TransactionController@index');
    Route::get('transaction/create','TransactionController@create');
    Route::post('transaction/store','TransactionController@store');

    //Student Routes
    Route::get('student/tod','StudentController@tod');
    Route::get('student/esif','StudentController@esif');
    Route::get('student/images','StudentController@images');
    //Student Routes End

    //Accounts
    Route::get('coa','ChartOfAccountController@index');
    Route::get('coa/create','ChartOfAccountController@create');
    Route::post('coa/store','ChartOfAccountController@store');
    Route::get('coa/edit/{id}','ChartOfAccountController@edit');
    Route::patch('coa/{id}/update','ChartOfAccountController@update');
    Route::delete('coa/destroy/{id}','ChartOfAccountController@destroy');
    Route::post('coa/status','ChartOfAccountController@isEnabled');
    //Accounts End

    //Admission Routes
    Route::post('admission/store','AdmissionController@store');
    Route::post('admission/unapprove/{roll}','AdmissionController@unapprove');
    //Admission Routes Ends

//Upcoming Events
    Route::get('events','UpcomingEventController@index');
    Route::get('event/create','UpcomingEventController@create');
    Route::post('event/store','UpcomingEventController@store');
    Route::get('event/show/{id}','UpcomingEventController@show');
    Route::get('event/edit/{id}','UpcomingEventController@edit');
    Route::patch('event/{id}/update','UpcomingEventController@update');
    Route::delete('event/destroy/{id}','UpcomingEventController@destroy');
//Upcoming Events Ends

    //Playlists
    Route::get('playlists','PlaylistController@index');
    Route::post('playlist/store','PlaylistController@store');
    Route::get('playlist/show/{id}','PlaylistController@show');
    Route::delete('playlist/destroy/{id}','PlaylistController@destroy');
    //Playlists Ends

    //Videos
    Route::get('videos','VideoController@index');
    Route::post('video/store','VideoController@store');
    Route::get('video/edit','VideoController@edit')->name('video.edit');
    Route::patch('video/{id}/update','VideoController@update');
    Route::delete('video/destroy/{id}','VideoController@destroy');
    //Videos End

    //Applied Student
    Route::post('applied-student/view','AppliedStudentController@studentView');
    //Applied Student Ends

    //Holiday Setup
    Route::get('holidays','HolidayController@index')->name('attendance.holiday');
    Route::post('holiday/store','HolidayController@store');
    Route::get('holiday/edit/{id}','HolidayController@edit');
    Route::patch('holiday/{id}/update','HolidayController@update');
    Route::delete('holiday/delete/{id}','HolidayController@destroy');
    //Holiday Setup


        // Imam Hasan Journal Routes
    Route::resource('journals', "JournalController")->middleware('auth');
    Route::get('journal/classic','JournalController@classic');
    Route::get('cash-book','AccountingController@cashBook');
    Route::post('cash-book-settings','AccountingController@cashBookSetting');
    Route::get('ledger','AccountingController@ledger');
    Route::get('trial-balance','AccountingController@trialBalance');
    Route::get('profit-n-loss','AccountingController@profitNLoss');
    Route::get('balance-sheet','AccountingController@balanceSheet');
    // Imam Hasan Journal Routes
    // Imam Hasan Journal Routes
    //Route::resource('journals', "JournalController")->middleware('auth');
// Imam Hasan Journal Routes

    // accounting Reports by Imam Hasan\
    //Route::get('balance-sheet', "AccountingController@balance_sheet")->name('balance_sheet');
    // accounting Reports by Imam Hasan

    // Route for test
    Route::view('bl', 'admin.reports.balance_sheet');
    // Route for test
    /** Menu Routes Starts */
    Route::get('menus','MenuController@index');
    Route::post('menu/store','MenuController@store')->name('menu.store');
    Route::get('menu/edit','MenuController@edit')->name('menu.edit');
    Route::patch('menu/{id}/update','MenuController@update')->name('menu.update');
    Route::delete('menu/destroy/{id}','MenuController@destroy');
    /** Menu Routes Ends */

    Route::get('pages','PageController@index');
    Route::get('page/create','PageController@create');
    Route::post('page/store','PageController@store');
    Route::get('page/edit/{id}','PageController@edit');
    Route::patch('pages/{id}/update','PageController@update');
    Route::delete('pages/destroy/{id}','PageController@destroy');
    Route::delete('pages/remove/{id}','PageController@remove');

    Route::get('siteinfo','SiteInformationController@index')->name('siteinfo');
    Route::patch('site-info/update','SiteInformationController@update');
    Route::patch('site-info/google_map','SiteInformationController@update_google_map');
    Route::patch('site-info/logo','SiteInformationController@logo');

    Route::get('sliders','SliderController@index');
    Route::post('slider/store','SliderController@store');
    Route::delete('slider/destroy/{id}','SliderController@destroy');

    Route::get('students','StudentController@index')->name('student.list');
    Route::get('student/create','StudentController@create')->name('student.add');
    Route::get('student/edit/{id}','StudentController@edit');
    Route::patch('student/{id}/update','StudentController@update');
    Route::get('student/drop/{id}','StudentController@dropOut');
    Route::get('student/subjects/{id}','StudentController@subjects');
    Route::patch('student/{id}/assign','StudentController@assignSubject');
    Route::get('/load_student_id','StudentController@loadStudentId');
    Route::get('/load_online_student_info','FrontController@loadStudentInfo');

    Route::get('student/promotion','StudentController@promotion')->name('student.promotion');
    Route::post('student/promote','StudentController@promote')->name('student.promote');

    Route::get('features','FeatureController@index');
    Route::get('feature/create','FeatureController@create');
    Route::post('feature/store','FeatureController@store');
    Route::get('feature/edit/{id}','FeatureController@edit');
    Route::patch('feature/{id}/update','FeatureController@update');
    Route::delete('feature/destroy/{id}','FeatureController@destroy');

    Route::get('themes','ThemeController@index');
    Route::get('theme/edit/{id}','ThemeController@edit');
    Route::delete('theme/destroy/{id}','ThemeController@destroy');

    // smartrahat start


    Route::get('notices','NoticeController@index');
    Route::post('notice/store','NoticeController@store');
    Route::get('notice/edit/{id}','NoticeController@edit');
    Route::patch('notice/{id}/update','NoticeController@update');
    Route::delete('notice/destroy/{id}','NoticeController@destroy');

    Route::get('notice/category','NoticeCategoryController@index');
    Route::post('notice/category/store','NoticeCategoryController@store');
    Route::get('notice/category/edit/{id}','NoticeCategoryController@edit');

    Route::get('notice/type','NoticeTypeController@index');
    Route::post('notice/type/store','NoticeTypeController@store');
    Route::get('notice/type/edit/{id}','NoticeTypeController@edit');

// smartrahat end

    //Weekly Off Setting starts by Nishat
    Route::get('attendance/weeklyOff','WeeklyOffController@index');
    Route::post('attendance/weeklyOff/store','WeeklyOffController@store')->name('weeklyOff.store');
    Route::get('attendance/weeklyOff/edit/{id}','WeeklyOffController@edit')->name('weeklyOff.edit');
    Route::delete('attendance/weeklyOff/delete/{id}','WeeklyOffController@destroy');
//Weekly Off Setting ends by Nishat

    /** User Routes */
    Route::get('users','UserController@index');
    Route::get('user/create','UserController@create')->name('user.add');
    Route::post('user/store','UserController@store');
    Route::get('user/edit/{id}','UserController@edit');
    Route::delete('user/destroy/{id}','UserController@destroy');
    /** User Routes End */

    //Syllabus Section Start A R Babu
    Route::get('syllabuses','SyllabusController@index')->name('syllabus.index');
    Route::post('syllabus/store','SyllabusController@store')->name('syllabus.store');
    Route::get('syllabus/delete/{id}','SyllabusController@destroy')->name('syllabus.delete');
//Syllabus Section End

    //leave purpose starts by Nishat
    Route::get('attendance/leavePurpose','LeavePurposeController@index');
    Route::get('attendance/leavePurpose/add','LeavePurposeController@add')->name('leavePurpose.add');
    Route::post('attendance/leavePurpose/store','LeavePurposeController@store')->name('leavePurpose.store');
    Route::get('attendance/leavePurpose/edit/{id}','LeavePurposeController@edit')->name('leavePurpose.edit');
    Route::patch('attendance/leavePurpose/{id}/update','LeavePurposeController@update')->name('leavePurpose.update');
    Route::post('attendance/leavePurpose/delete/{id}','LeavePurposeController@destroy')->name('leavePurpose.delete');
    //leave purpose ends by Nishat

    //leave management starts by Nishat
    Route::get('attendance/leaveManagement','LeaveManagementController@index');
    Route::get('attendance/leaveManagement/add','LeaveManagementController@add')->name('leaveManagement.add');
    Route::post('attendance/leaveManagement/store','LeaveManagementController@store')->name('leaveManagement.store');
    Route::get('attendance/leaveManagement/edit/{id}','LeaveManagementController@edit')->name('leaveManagement.edit');
    Route::delete('attendance/leaveManagement/delete/{id}','LeaveManagementController@destroy');
    //leave management ends by Nishat

    //Book Category starts by Nishat
    Route::get('library/bookCategory','BookCategoryController@index');
    Route::get('library/bookCategory/add','BookCategoryController@add')->name('bookCategory.add');
    Route::post('library/bookCategory/store','BookCategoryController@store')->name('bookCategory.store');
    Route::get('library/bookCategory/edit','BookCategoryController@edit')->name('book-category.edit');
//    Route::get('library/bookCategory/edit/{id}','BookCategoryController@edit')->name('bookCategory.edit');
    Route::patch('library/bookCategory/{id}/update','BookCategoryController@update')->name('bookCategory.update');
    Route::post('library/bookCategory/delete/{id}','BookCategoryController@destroy')->name('bookCategory.delete');

    //Book Category ends by Nishat



    //library Management Starts By Nishat
    //Add New Book
    Route::get('library/books','BookController@index');
    Route::get('library/allBooks','BookController@show')->name('allBooks.show');
    Route::get('library/SearchBook','BookController@search')->name('allBooks.search');
    Route::get('library/books/add','BookController@add')->name('newBook.add');
    Route::post('library/books/store','BookController@store')->name('newBook.store');
    Route::get('library/books/edit/{id}','BookController@edit')->name('newBook.edit');
    Route::patch('library/books/{id}/update','BookController@update')->name('newBook.update');
    Route::post('library/books/delete/{id}','BookController@destroy')->name('newBook.delete');

    //issue/return books
    Route::get('library/issue_books','BookController@issueBook')->name('issueBook.index');
    Route::post('library/issue-books/store','BookController@issueBookStore')->name('issueBook.store');
    Route::get('library/return_books','BookController@returnBook')->name('returnBook.index');
    Route::post('library/return-books/store','BookController@returnBookStore')->name('returnBook.store');


//    report
    Route::get('library/report','BookController@report')->name('report');

    //library management ends by Nishat

//    route for api setting starts here

    Route::get('communication/apiSetting','CommunicationSettingController@index')->name('communication.apiSetting');
    Route::patch('communication/apiSetting/update','CommunicationSettingController@update')->name('apiSetting.update');

//    route for api setting ends here

//    route for email setting starts here
    Route::get('setting/email','EmailSettingController@index')->name('setting.email');
    Route::post('setting/email/store','EmailSettingController@store')->name('email.store');
    Route::post('setting/email/edit','EmailSettingController@edit')->name('email.edit');
    Route::post('setting/email/update','EmailSettingController@update')->name('email.update');
    Route::delete('setting/email/delete/{id}','EmailSettingController@destroy')->name('email.delete');
//    route for email setting ends here

    //    route for google map setting starts here
    Route::get('setting/map','MapSettingController@index')->name('setting.map');
    Route::get('setting/map/store','MapSettingController@store')->name('map.store');
//    route for google map setting ends here

    //Social Links start
    Route::get('socials','SocialController@index')->name('social.index');
    Route::post('socials/update/{id}','SocialController@update')->name('social.store');
//Social Links End

    Route::get('page-media/destroy/{id}','PageMediaController@destroy');

//Route for fee setup starts here
    Route::get('fee/fee-setup',[FeeSetupController::class,'index'])->name('fee-setup.index');
    Route::post('fee/fee-setup/store',[FeeSetupController::class,'feeSetupStore'])->name('fee-setup.feeSetupStore');
    Route::get('fee/fee-setup/view',[FeeSetupController::class,'view'])->name('fee-setup.view');
    Route::post('fee/fee-setup/viewFeeDetails',[FeeSetupController::class,'viewFeeDetails'])->name('fee-setup.viewFeeDetails');
    Route::get('fee/fee-setup/search',[FeeSetupController::class,'search'])->name('fee-setup.search');
    Route::get('fee/fee-setup/edit/{id}',[FeeSetupController::class,'edit'])->name('fee-setup.edit');
    Route::patch('fee/fee-setup/update/{id}',[FeeSetupController::class,'update'])->name('fee.fee-setup.update');
    Route::post('fee/fee-setup/delete/{id}',[FeeSetupController::class,'destroy'])->name('fee.fee-setup.delete');

    Route::post('fee/fee-cart/store',[FeeCartController::class,'store']);
    Route::post('fee/fee-cart/destroy',[FeeCartController::class,'destroy']);
    Route::post('fee/fee-cart/flush',[FeeCartController::class,'flush']);

    Route::post('fee/edit-fee-cart/destroy',[FeeCartController::class,'EditFeeCartDestroy']);
//Route for fee setup ends here

    //Route for fee collection starts here
    Route::get('fee/fee-collection',[FeeCollectionController::class,'index']);
    Route::get('fee/fee-collection/view',[FeeCollectionController::class,'view']);
    Route::post('fee/fee-collection/store',[FeeCollectionController::class,'store']);
    Route::get('fee/all-collections',[FeeCollectionController::class,'allCollections']);
    Route::get('fee/all-collection/report/{id}',[FeeCollectionController::class,'report']);

    //Route for fee collection ends here

    // Gallery Routes start
    Route::get('gallery/image','GalleryController@index')->name('settings.image');
    Route::post('gallery/image/store','GalleryController@store');
    Route::delete('gallery/image/destroy/{id}','GalleryController@destroy');

    Route::get('gallery/category','GalleryCategoryController@index');
    Route::post('gallery/category/store','GalleryCategoryController@store');
    Route::delete('gallery/category/destroy/{id}','GalleryCategoryController@destroy');

    Route::get('gallery/albums','AlbumController@index');
    Route::post('gallery/album/store','AlbumController@store');
    Route::delete('gallery/album/delete/{id}','AlbumController@destroy');
// Gallery Routes ends

});

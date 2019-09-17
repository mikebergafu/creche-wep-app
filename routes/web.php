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
Route::get('test1',function(){
	return Hash::make('123456');
});

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('sendmail', 'SendMailController@sendMail');
Route::get('sendsms', 'SMSController@toSMS');

Route::group(['middleware' => 'admin'],function (){

});

Route::group(['middleware' => 'super.admin'],function (){
//Register Routes
    Route::get('/register', 'RegisterController@showRegisterForm')->name('register.show');
    Route::post('/register', 'RegisterController@registerUser')->name('register.add');
    Route::get('/users/view/all', 'RegisterController@getUsers')->name('users.show.all');
    Route::delete('/user/delete/{id}', 'RegisterController@deleteUser')->name('user.delete');
    Route::delete('/guardians/delete/{id}', 'SuperAdminController@deleteGuardian')->name('guardian.delete');
    Route::put('/user/edit/{id}', 'RegisterController@editUser')->name('user.update');
    Route::get('/user/edit/form/{id}', 'RegisterController@showEditUser')->name('user.update.form');
    Route::get('/role', 'RegisterController@showRoleForm')->name('role.show');
    Route::post('/role', 'RegisterController@addRole')->name('role.add');

    //Super Admin Routes
    Route::get('/parents/form', 'SuperAdminController@showParentFormG')->name('su.parent.show');
    Route::post('/parents/register', 'SuperAdminController@registerParent')->name('parent.register');

    Route::get('/parents/children/{id}', 'SuperAdminController@getChildrenG')->name('su.parent.children');
    Route::get('/caretaker/tasks/list', 'SuperAdminController@showTasks')->name('su.tasks.list');
    Route::get('/caretaker/tasks/history/list', 'SuperAdminController@showTasksHistory')->name('su.tasks.history.list');

    //Assign Child
    Route::get('/su/assign/child/{id}','SuperAdminController@showAssignForm')->name('su.assign.show');
    Route::post('/su/assign/child','SuperAdminController@assignChild')->name('su.assign.child');

    //caretaker
    Route::delete('/caretakers/status/delete/{id}', 'CareTakerStatusController@deleteStatus')->name('delete.caretakers.status');

    //Parent
    Route::get('/parents/list', 'SuperAdminController@indexG')->name('su.parent.list');

    //test res
    Route::get('/res/test','SuperAdminController@showTest');
});






//Children
Route::get('/child/form', 'ChildController@showChildForm')->name('child.form.show');
Route::post('/child/register', 'ChildController@registerChild')->name('child.register');
Route::get('/children/view/all', 'ChildController@getChildren')->name('child.show.all');


//Parent Routes
//Route::get('/parents/form', 'GuardianController@showParentForm')->name('parent.show');
Route::get('/children/assigned/list', 'GuardianController@showAssigned')->name('children.assigned.list');
Route::get('/caretakers/tasks/list', 'GuardianController@showTasks')->name('caretaker.tasks.list');
Route::get('/my/children', 'GuardianController@getChildren')->name('my.children');
Route::get('/my/children/tasks/list','GuardianController@showTasks')->name('my.children.tasks.show');
Route::get('/my/children/tasks/history/list','GuardianController@showTasksHistory')->name('my.children.tasks.history.show');

//Child Routes

//Assign Child
Route::get('/parents/assign/children/{id}','AssignChildController@showAssignForm')->name('assign.show');
Route::get('/parents/assign/children/list','AssignChildController@showAssigned')->name('my.children.assign.list');
Route::post('/parents/assign/children','AssignChildController@assignChild')->name('assign.child');


//Manage Caretakers

Route::get('caretakers/children/list','CareTakerStatusController@getAssignedChildren')->name('show.caretaker.children');

Route::get('caretakers/list','CareTakerStatusController@index')->name('show.caretakers');
Route::post('/caretakers/add/status', 'CareTakerStatusController@create')->name('caretakers.status.create');
Route::get('/caretakers/add/status/{id}', 'CareTakerStatusController@createForm')->name('caretakers.status.form');
Route::delete('/caretakers/delete/{id}', 'RegisterController@deleteUser')->name('delete.caretakers');
Route::put('/caretakers/edit/{id}', 'RegisterController@editUser')->name('update.caretakers');
Route::get('/caretakers/edit/form/{id}', 'RegisterController@showEditUser')->name('caretakers.update.form');

Route::get('children/assign/list','CaretakerTaskController@getAssignedChildren')->name('show.assign.children');
//Child Task
Route::get('tasks/list','CaretakerTaskController@index')->name('tasks.show');
Route::get('tasks/history/list','CaretakerTaskController@caretakerTasksHistory')->name('tasks.history.show');
Route::get('tasks/add/load/{id}','CaretakerTaskController@createForm')->name('tasks.create.form');
Route::post('/tasks/add/{id}','CaretakerTaskController@create')->name('tasks.create');
Route::delete('/tasks/delete/{id}','CaretakerTaskController@delete')->name('tasks.delete');
Route::put('/tasks/edit/{id}','CaretakerTaskController@update')->name('tasks.update');
Route::get('/tasks/edit/{id}','CaretakerTaskController@updateForm')->name('tasks.update.form');

//Message
Route::get('/messages','MessageController@showMessage')->name('message.show');
Route::get('/parent/messages','MessageController@showMessageParent')->name('message.show.parent');
Route::get('/caretaker/messages','MessageController@showMessageCaretaker')->name('message.show.caretaker');
Route::get('/messages/write','MessageController@writeMessage')->name('message.write.show');
Route::get('/caretaker/write','MessageController@writeMessageCaretaker')->name('caretaker.write.show');
Route::get('/parent/write','MessageController@writeMessageParent')->name('parent.write.show');
Route::get('/messages/daily','MessageController@showDaily')->name('message.show.daily');

Route::post('/parent/write','MessageController@addMessageParent')->name('parent.add');
Route::post('/caretaker/write','MessageController@addMessageCaretaker')->name('caretaker.add');
Route::post('/messages/write','MessageController@addMessage')->name('message.add');


Route::get('/logout', 'HomeController@login')->name('logout');

Route::get('/sms/send/{to}', 'SMSController@sendSms');

Route::put('/assign/confirm/{id}/{child_id}', 'CaretakerTaskController@confirmAssign')->name('confirm.child.assigned');
Route::put('/assign/confirm-pickup/{id}/{child_id}', 'GuardianController@confirmPickup')->name('confirm.child.pickup');




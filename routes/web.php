<?php

use App\Http\Controllers\LppmUserController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\StudentController;

Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();
// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
    Route::get('/user/search', 'Admin\UsersController@search')->name('user.search');
    Route::get('/student/search', 'StudentController@search')->name('student.search');
    Route::get('/student/search/member', 'StudentController@search_member')->name('search.member');
    Route::get('/employee/search', 'EmployeeController@search')->name('employee.search');
    Route::get('/lpj/search', 'LpjController@search')->name('lpj.search');

    //Event Route
    Route::resource('events', 'EventController');
    //Participant Type Route
    Route::resource('participant_type', 'ParticipantTypeController');
    //Places Route
    Route::resource('places', 'PlaceController');
    //Organizations Route
    Route::resource('organizations', 'OrganizationController');
    //Type Anggaran Route
    Route::resource('type_anggaran', 'TypeAnggaranController');
    //DOP Revision Route
    Route::resource('dop_revisions', 'DopRevisionController');
    Route::get('/dop_revision/deletecomment/{dop}', 'DopRevisionController@deleteComment')->name('doprevision.deletecomment');
    //DOP Route
    Route::resource('dops', 'DopController');
    Route::post('/dop/update_attachment/{dop}', 'DopController@update')->name('dop.updateattachment');
    Route::get('/dop/approve/{dop}', 'DopController@approve')->name('dop.approve');
    Route::get('/dop/revoke/{dop}', 'DopController@revoke')->name('dop.revoke');
    Route::get('/dop/reject/{dop}', 'DopController@reject')->name('dop.reject');
    Route::get('/dop/process', 'DopController@process')->name('dop.process');
    Route::get('/dop/rejected', 'DopController@rejected')->name('dop.rejected');
    Route::get('/dop/receiptfunds/{dop}', 'DopController@receiptFund')->name('dop.receiptFund');
    Route::get('/dop/destroyreceiptfund/{dop}', 'DopController@destroyReceiptFund')->name('dop.destroyReceiptFund');
    Route::get('/dop/selectperiodedanarutin/', 'DopController@periodeRutin')->name('dop.periodeRutin');
    Route::get('/dop/selectperiodedananonrutin/', 'DopController@periodeNonRutin')->name('dop.periodeNonRutin');
    Route::get('/dop/report/', 'DopController@report')->name('dop.report');
    Route::get('/dop/reportnonrutin/', 'DopController@reportNonRutin')->name('dop.reportnonrutin');
    Route::get('/dop/selectrekap/', 'DopController@periodeRekapitulasi')->name('dop.perioderekap');
    Route::get('/dop/reportrekap/', 'DopController@reportRekap')->name('dop.reportrekap');
    Route::get('/dop/email/', 'DopController@kirimEmail')->name('dop.email');

    //LPJ Route
    Route::resource('lpjs', 'LpjController');
    Route::get('/lpj/finalize/{proposal}', 'LpjController@finalize')->name('lpj.finalize');
    Route::get('/lpj/show/', 'LpjController@show')->name('lpj.show');
    Route::post('/lpj/post', 'LpjController@post_lpj')->name('lpj.post');
    Route::post('/lpj/update', 'LpjController@update_lpj')->name('lpj.update');
    Route::post('/lpj/approve', 'LpjController@approve')->name('lpj.approve');
    Route::post('/lpj/revoke', 'LpjController@revoke')->name('lpj.revoke');
    Route::post('/lpj/process', 'LpjController@approved')->name('lpj.process');
    Route::get('/event/documentations/', 'LpjController@documentation')->name('event.documentation');
    //Stundents Route
    Route::resource('students', 'StudentController');
    Route::get('/student/member', 'StudentController@member')->name('student.member');
    Route::post('/student/update_akses', 'StudentController@update_akses_member')->name('student.update_akses');
    Route::get('/student/revoke_akses/{student}', 'StudentController@revoke_akses_member')->name('student.revoke_akses');
    Route::get('/student/revoke_akses_anggota/{student}', 'StudentController@revoke_member')->name('student.revoke_akses_anggota');
    Route::get('student/organization', 'StudentController@studentOrganization')->name('student.organization');
    //Employees Route
    Route::resource('employees', 'EmployeeController');
    Route::resource('committee-roles', 'CommitteeRoleController');
    //Proposal Route
    Route::resource('proposals', 'ProposalController');
    Route::get('/proposal/cek', 'ProposalController@cek')->name('cek.proposal');
    Route::get('/proposal/print/{proposal}', 'ProposalController@print')->name('print.proposal');
    Route::get('/lpj/print/{lpj}', 'LpjController@print')->name('print.lpj');
    Route::resource('revisions', 'RevisionController');
    Route::resource('lpj_revisions', 'LpjRevisionController');
    Route::post('/proposals/store_proposal', 'ProposalController@store_proposal')->name('store.proposal');
    Route::post('/proposals/store_proposal_instituti', 'ProposalController@store_proposal_institusi')->name('store-institusi.proposal');
    Route::get('/proposal/search/', 'ProposalController@search')->name('search.proposal');
    Route::get('/proposal/search_pengajuan/', 'ProposalController@search_pengajuan')->name('search_pengajuan.proposal');
    Route::post('/proposal/fund_store/', 'ProposalController@fund_store')->name('fund.store');
    Route::delete('/proposal/fund_destroy/{penerimaan_dana}', 'ProposalController@fund_destroy')->name('fund.destroy');
    Route::get('/proposal/institusi', 'ProposalController@institusi')->name('institusi.proposal');
    //Route::get('/proposals/finalize/{proposal}', 'ProposalController@finalize')->name('proposals.finalize');


    //Committe Route
    Route::get('/proposals/destroy_committee/{proposal}', 'ProposalController@destroy_committee')->name('committee.destroy');
    Route::post('/proposals/update_committee/{proposal}', 'ProposalController@update_committee')->name('committee.update');
    Route::post('/proposals/store_committee', 'ProposalController@store_committee')->name('committee.store');
    //Budget Receipt Route
    Route::post('/proposals/store_budgetreceipt', 'ProposalController@store_budget_receipt')->name('budgetreceipt.store');
    Route::post('/proposals/update_budgetreceipt', 'ProposalController@update_budgetreceipt')->name('budgetreceipt.update');
    Route::get('/proposals/destroy_budgetreceipt/{proposal}', 'ProposalController@destroy_budgetreceipt')->name('budgetreceipt.destroy');
    //Budget Expenditure Route
    Route::post('/proposals/store_budgetexpenditure', 'ProposalController@store_budget_expenditure')->name('budgetexpenditure.store');
    Route::post('/proposals/update_budgetexpenditure', 'ProposalController@update_budgetexpenditure')->name('budgetexpenditure.update');
    Route::get('/proposals/destroy_budgetexpenditure/{proposal}', 'ProposalController@destroy_budgetexpenditure')->name('budgetexpenditure.destroy');
    //Planning Schedule Route
    Route::post('/proposals/store_planning', 'ProposalController@store_planning')->name('planning.store');
    Route::post('/proposals/update_planning', 'ProposalController@update_planning')->name('planning.update');
    Route::get('/proposals/destroy_planning/{proposal}', 'ProposalController@destroy_planning')->name('planning.destroy');
    //Schedule Route
    Route::post('/proposals/store_schedule', 'ProposalController@store_schedule')->name('schedule.store');
    Route::post('/proposals/update_schedule', 'ProposalController@update_schedule')->name('schedule.update');
    Route::get('/proposals/destroy_schedule/{proposal}', 'ProposalController@destroy_schedule')->name('schedule.destroy');
    //Participant Route
    Route::post('/proposals/store_participant', 'ProposalController@store_participant')->name('participant.store');
    Route::post('/proposals/update_participant', 'ProposalController@update_participant')->name('participant.update');
    Route::get('/proposals/destroy_participant/{proposal}', 'ProposalController@destroy_participant')->name('participant.destroy');
    //Revision Route
    Route::post('/proposals/store_revision', 'ProposalController@store_revision')->name('revision.store');
    Route::post('/proposals/revision_done/{proposal}', 'ProposalController@revision_done')->name('revision.done');
    Route::post('/proposals/revision_undone/{proposal}', 'ProposalController@revision_undone')->name('revision.undone');
    //LPJ Revision Route
    Route::post('/lpj/store_revision', 'LpjController@store_revision')->name('lpj_revision.store');
    Route::post('/lpj/revision_done/{lpj}', 'LpjController@revision_done')->name('lpj_revision.done');
    Route::post('/lpj/revision_undone/{lpj}', 'LpjController@revision_undone')->name('lpj_revision.undone');

    Route::get('/update_profile/', 'ProposalController@update_profile')->name('update.profile');
    //Approval Route
    Route::post('/proposals/process', 'ProposalController@approved')->name('proposal.process');

    //Report Route
    Route::get('/proposal/report/', 'ProposalController@report')->name('proposals.report');
    Route::get('/proposal/view-bypass/','ProposalController@viewBypass')->name('proposals.viewBypass');
    Route::get('/proposal/process-bypass/{proposal}','ProposalController@processByPass')->name('proposals.processBypass');

    //Realize_Budget_Receive
    Route::post('/lpj/finalize/simpanpenerimaan', 'RealizeBudgetReceiptController@store')->name('lpj.storepenerimaan');
    Route::post('/lpj/finalize/updatepenerimaan/{rbr}', 'RealizeBudgetReceiptController@update')->name('lpj.updatepenerimaan');
    Route::delete('/lpj/finalize/deletepenerimaan/{rbr}', 'RealizeBudgetReceiptController@destroy')->name('lpj.deletepenerimaan');
    Route::post('/lpj/finalize/addpenerimaan', 'RealizeBudgetReceiptController@modal_store')->name('lpj.addpenerimaan');

    //Realize_Budget_Expenditure
    Route::post('/lpj/finalize/simpanpengeluaran', 'RealizeBudgetExpenditureController@store')->name('lpj.storepengeluaran');
    Route::post('/lpj/finalize/updatepengeluaran/{rbe}', 'RealizeBudgetExpenditureController@update')->name('lpj.updatepengeluaran');
    Route::delete('/lpj/finalize/deletepengeluaran/{rbe}', 'RealizeBudgetExpenditureController@destroy')->name('lpj.deletepengeluaran');
    Route::post('/lpj/finalize/addpengeluaran', 'RealizeBudgetExpenditureController@modal_store')->name('lpj.addpengeluaran');

    //Realize_Planning_Schedule
    Route::post('/lpj/finalize/simpanjadwalperencanaan', 'RealizePlanningScheduleController@store')->name('lpj.storejadwalperencanaan');
    Route::post('/lpj/finalize/updatejadwalperencanaan/{rps}', 'RealizePlanningScheduleController@update')->name('lpj.updatejadwalperencanaan');
    Route::delete('/lpj/finalize/deletejadwalperencanaan/{rps}', 'RealizePlanningScheduleController@destroy')->name('lpj.deletejadwalperencanaan');
    Route::post('/lpj/finalize/addjadwalperencanaan', 'RealizePlanningScheduleController@modal_store')->name('lpj.addjadwalperencanaan');

    //Realize_Schedule
    Route::post('/lpj/finalize/simpansusunan', 'RealizeScheduleController@store')->name('lpj.storesusunan');
    Route::post('/lpj/finalize/updatesusunan/{rps}', 'RealizeScheduleController@update')->name('lpj.updatesusunan');
    Route::delete('/lpj/finalize/deletesusunan/{rps}', 'RealizeScheduleController@destroy')->name('lpj.deletesusunan');
    Route::post('/lpj/finalize/addsusunan', 'RealizeScheduleController@modal_store')->name('lpj.addsusunan');

    //Realize_Peserta
    Route::post('/lpj/finalize/simpanpeserta', 'RealizeParticipantController@store')->name('lpj.storepeserta');
    Route::post('/lpj/finalize/updatepeserta/{rps}', 'RealizeParticipantController@update')->name('lpj.updatepeserta');
    Route::delete('/lpj/finalize/deletepeserta/{rps}', 'RealizeParticipantController@destroy')->name('lpj.deletepeserta');
    Route::post('/lpj/finalize/addpeserta', 'RealizeParticipantController@modal_store')->name('lpj.addpeserta');

    Route::get('/suggestions', 'Admin\UsersController@suggest')->name('suggest.users');

    //Leader Suggestions
    Route::resource('leader-submissions', 'LeaderSubmissionController');
    Route::get('/leader-submission/show-leader', 'LeaderSubmissionController@showSubmission')->name('leader-submissions.show-leader');
    Route::post('/leader-submission/set-leader', 'LeaderSubmissionController@approveSubmission')->name('leader-submissions.set-leader');
    Route::post('/leader-submission/revoke-leader', 'LeaderSubmissionController@revokeSubmission')->name('leader-submissions.revoke-leader');
    Route::get('/leader-submission/cancel-submission-leader/{submission}', 'LeaderSubmissionController@cancelSubmission')->name('leader-submissions.cancel-submission-leader');

    //User Logs
    Route::resource('user-logs', 'UserLogController');
    Route::get('/user-log/destroy-all', 'UserLogController@destroyAll')->name('user-logs.destroy-all');
    
    //LPPM USERS Route
    Route::resource('lppm-users', 'LppmUserController');

});

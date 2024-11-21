<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyDatailsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AlbumeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\LandOwnerController;
use App\Http\Controllers\BuyersController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\GallaryController;
use App\Http\Controllers\HomepageManageController;
use App\Http\Controllers\MemberCategoryController;
use App\Http\Controllers\MemberListController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubmenuController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ClassNameController;
use App\Http\Controllers\ImportantLinkController;
use App\Http\Controllers\StudentInformationController;
use App\Http\Controllers\FullCalenderEventController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\SubAreaController;
use App\Http\Controllers\MarketingController;
use App\Http\Controllers\MarketingLoginController;
use App\Http\Controllers\FranchiseFormController;
use App\Http\Controllers\FranchiseStoreController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CompitionCategoryController;
use App\Http\Controllers\SpacialCategoryController;
use App\Http\Controllers\SpecialExamDataController;
use App\Http\Controllers\CompetionRegiController;
use App\Http\Controllers\SpacialCategoryA2Controller;
use App\Http\Controllers\CompetionCategoryLevel2Controller;
use App\Http\Controllers\CompetionStatusController;
use App\Http\Controllers\CompetionLevel5Controller;
use App\Http\Controllers\CompetionLevel6Controller;
use App\Http\Controllers\FlashCompetitionController;
use App\Http\Controllers\GameTimeController;
use App\Http\Controllers\CategoryB1Level1Controller;
use App\Http\Controllers\CategoryB2Level1Controller;
use App\Http\Controllers\CategoryDLevel3Controller;
use App\Http\Controllers\CategoryELevel4Controller;
use App\Http\Controllers\CategoryHLevel7Controller;
use App\Http\Controllers\CategoryILevel8Controller;
use App\Http\Controllers\FlashExamDataController;
use App\Http\Controllers\VisualGroupAController;
use App\Http\Controllers\VisualGroupBController;
use App\Http\Controllers\VisualGroupCController;
use App\Http\Controllers\FlashGroupAController;
use App\Http\Controllers\FlashGroupBController;
use App\Http\Controllers\FlashGroupCController;
use App\Http\Controllers\VisualAllGroupResultController;

/////

Route::get('/',[HomeController::class,'index']);
Route::get('/students/{id}',[HomeController::class,'Student']);
// Route::get('/5/{slug}',[HomeController::class,'teacherStudent']);
Route::get('studentsearch', [HomeController::class, 'SearchData']);
Route::get('/contact-us',[HomeController::class,'contactUs']);
Route::post('/contactus',[HomeController::class,'store']);
Route::get('/1/{slug}',[HomeController::class,'aboutUs']);
Route::get('/2/{slug}',[HomeController::class,'courseInfo']);
Route::get('/3/{slug}',[HomeController::class,'benefits']);
Route::get('/4/{slug}',[HomeController::class,'training']);
Route::get('/6/{slug}',[HomeController::class,'allNewsMessage']);
Route::get('/5/{slug}',[HomeController::class,'mediaGallery']);
Route::get('/10/{slug}',[HomeController::class,'downloadCorner']);
Route::get('/11/{slug}',[HomeController::class,'Addmission']);
Route::get('/view-file/{id}',[HomeController::class,'ViewFile']);
Route::get('profile-view/{id}',[HomeController::class,'singleProfile']);
Route::get('student-profile-view/{id}',[HomeController::class,'partnersProfile']);
Route::get('/read-more/{id}',[HomeController::class,'ReadMore']);
Route::post('/studant_stor',[StudentInformationController::class,'studantStor']);
Route::get('areaName/{id}', [HomeController::class, 'AreaName'])->name('areaName');
Route::get('new_app', [HomeController::class, 'NewApp']);
Route::get('compition', [HomeController::class, 'CompitionGame']);
Route::get('/special-one', [HomeController::class, 'SpecialOne']);
Route::get('/level-2', [HomeController::class, 'Level2']);
Route::get('/level-5', [HomeController::class, 'Level5']);
// Route::get('/special-two', [HomeController::class, 'SpecialTwo']);
Route::get('/special-two/{id}', [HomeController::class, 'specialTwo'])->name('specialTwo');
Route::get('/visual-competition/{id}', [HomeController::class, 'VisualCompetition']);
Route::get('/flash-competition/{id}', [HomeController::class, 'FlashCompetition']);
Route::post('/marketing-data-store',[MarketingController::class,'MarketingDataStor']);
Route::post('/franchise-data-store',[FranchiseStoreController::class,'FranchiseDataStor']);
Route::post('/competition-registration',[CompetionRegiController::class,'CompetionDataStor']);
Route::get('areaName/{id}', [HomeController::class, 'AreaName'])->name('areaName');

Route::match(['get', 'post'], 'marketing-form', [HomeController::class, 'MarketingLogin']);
Route::match(['get', 'post'], 'competition-login', [HomeController::class, 'CompetionLogin']);
Route::get('competition-logout', [HomeController::class, 'CompetitionLogout']);
Route::get('competition-register-form', [HomeController::class, 'CompetionRegiForm']);
Route::post('3/marketing', [HomeController::class, 'logout'])->name('logout.marketing');
Route::post('/special-examdataA2', [SpecialExamDataController::class, 'updateExamDataA2'])->name('update.examdataA2');
Route::post('/flash-examdataA2', [FlashExamDataController::class, 'FlashExamDataA2'])->name('update.flashexamdataA2');

Route::get('/login', function () {
    return view('admin.auth.login');
});

Route::middleware('auth')->group(function () {
    Route::resource('homepagemanage',HomepageManageController::class);
    Route::get('menu_type/{menuId}', [HomepageManageController::class,'menuType']);
    Route::resource('gallary',GallaryController::class);
    Route::resource('calender-event',FullCalenderEventController::class);
    Route::resource('video',VideoController::class);
    Route::resource('about',AboutController::class);
    Route::resource('certificate',CertificateController::class);
    Route::resource('albume',AlbumeController::class);
    Route::resource('teacher_category',MemberCategoryController::class);
    Route::resource('teacher_list',MemberListController::class);
    Route::resource('basicinfo', BasicInfoController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('sub-menu', SubmenuController::class);
    Route::resource('class_time', ClassNameController::class);
    Route::resource('important_link', ImportantLinkController::class);
    Route::resource('area', AreaController::class);
    Route::resource('sub-area', SubAreaController::class);
    Route::resource('marketing', MarketingController::class);
    Route::resource('marketing-login', MarketingLoginController::class);
    Route::resource('franchise-form', FranchiseFormController::class);
    Route::resource('franchise-list', FranchiseStoreController::class);
    Route::resource('message-list', ContractController::class);
    Route::resource('compition-category', CompitionCategoryController::class);
    Route::resource('special-category', SpacialCategoryController::class);
    Route::resource('special-category-a2', SpacialCategoryA2Controller::class);
    Route::resource('category-b1-level1', CategoryB1Level1Controller::class);
    Route::resource('category-b2-level1', CategoryB2Level1Controller::class);
    Route::resource('category-d-level3', CategoryDLevel3Controller::class);
    Route::resource('competition-category-level2', CompetionCategoryLevel2Controller::class);
    Route::resource('category-e-level4', CategoryELevel4Controller::class);
    Route::resource('competition-category-level5', CompetionLevel5Controller::class);
    Route::resource('competition-category-level6', CompetionLevel6Controller::class);
    Route::resource('category-h-level7', CategoryHLevel7Controller::class);
    Route::resource('category-i-level8', CategoryILevel8Controller::class);
    Route::resource('visual-competition-result', SpecialExamDataController::class);
    Route::resource('visual-group-a-result', VisualGroupAController::class);
    Route::resource('visual-group-b-result', VisualGroupBController::class);
    Route::resource('visual-group-c-result', VisualGroupCController::class);
    Route::get('visual-special-a1',  [VisualAllGroupResultController::class,'speciala1']);
    Route::get('visual-special-a2',  [VisualAllGroupResultController::class,'speciala2']);
    Route::get('visual-b1-level1',  [VisualAllGroupResultController::class,'level1B1']);
    Route::get('visual-b2-level1',  [VisualAllGroupResultController::class,'level1B2']);
    Route::get('visual-c-level2',  [VisualAllGroupResultController::class,'level2']);
    Route::get('visual-d-level3',  [VisualAllGroupResultController::class,'level3']);
    Route::get('visual-e-level4',  [VisualAllGroupResultController::class,'level4']);
    Route::get('visual-f-level5',  [VisualAllGroupResultController::class,'level5']);
    Route::get('visual-g-level6',  [VisualAllGroupResultController::class,'level6']);
    Route::get('visual-h-level7',  [VisualAllGroupResultController::class,'level7']);
    Route::get('visual-i-level8',  [VisualAllGroupResultController::class,'level8']);
    Route::resource('flash-competition-result', FlashExamDataController::class);
    Route::resource('flash-group-a-result', FlashGroupAController::class);
    Route::resource('flash-group-b-result', FlashGroupBController::class);
    Route::resource('flash-group-c-result', FlashGroupCController::class);
    Route::get('result',  [SpecialExamDataController::class,'ResultData']);
    Route::resource('competition-status', CompetionStatusController::class);
    Route::resource('flash-competition-category', FlashCompetitionController::class);
    Route::resource('game-time', GameTimeController::class);

    // Route::post('/special-one/store-examdata', [SpecialExamDataController::class, 'storeExamData'])->name('store.examdata');
    Route::post('/special-examdata', [SpecialExamDataController::class, 'updateExamData'])->name('update.examdata');
    Route::post('/result-status', [SpecialExamDataController::class, 'updateResultStatus'])->name('update.result.status');
   
   
    Route::post('/flash-result-status', [FlashExamDataController::class, 'FlashResultStatus'])->name('flash.result.status');

    Route::resource('student_info', StudentInformationController::class);
    Route::get('student_peninfo', [StudentInformationController::class,'pendinglist']);
    Route::get('compition-regi-info', [CompetionRegiController::class,'index']);
    Route::get('compition-regi-info/create', [CompetionRegiController::class,'create']);
    Route::get('compition-regi-info/{id}/edit', [CompetionRegiController::class,'edit']);
    Route::post('compition-regi-store', [CompetionRegiController::class,'store']);
    Route::patch('compition-regi-info/{id}', [CompetionRegiController::class, 'update']);
    Route::delete('compition-regi-info/{id}', [CompetionRegiController::class, 'delete'])->name('compition-regi-info.delete');
    Route::post('/regi-update-status', [CompetionRegiController::class, 'regiUpdateStatus'])->name('regi.update.status');


    // Route::post('/update-status/{studentId}', [StudentInformationController::class,'updateStatus']);
    Route::post('student_peninfo_status', [StudentInformationController::class, 'UpdateStatus']);
    Route::get('/usermanage', [UserController::class,'index']);
    Route::get('/usermanageCreate', [UserController::class,'create']);
    Route::post('/usermanage', [UserController::class,'store']);
    Route::get('/usermanageDestroy/{id}', [UserController::class,'destroy']);
    Route::get('/usermanageEdit/{id}', [UserController::class,'edit']);
    Route::patch('/usermanage', [UserController::class,'update']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::resource('home_feature', ContentController::class);

});

require __DIR__.'/auth.php';

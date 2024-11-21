<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\BasicInfo;
use App\Models\contact;
use App\Models\HomepageManage;
use App\Models\content;
use App\Models\Gallary;
use App\Models\Albume;
use App\Models\Video;
use App\Models\MemberList;
use App\Models\SubMenu;
use App\Models\ImportantLink;
use App\Models\StudentInformation;
use App\Models\FullCalenderEvent;
use App\Models\ClassName;
use App\Models\SpacialCategory;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\MarketingLogin;
use App\Models\FranchiseForm;
use App\Models\CompitionCategory;
use App\Models\SpacialCategoryA2;
use App\Models\CompetionRegiManage;
use App\Models\CompetionStatus;
use App\Models\CompetitionCategoryLevel2;
use App\Models\CompetitionLevel5;
use App\Models\CompetitionLevel6;
use App\Models\FlashCompetition;
use App\Models\CategoryB1Level1;
use App\Models\CategoryB2Level1;
use App\Models\CategoryDLevel3;
use App\Models\CategoryELevel4;
use App\Models\CategoryHLevel7;
use App\Models\CategoryILevel8;
use App\Models\GameTime;
use App\Models\SpecialExamData;
use App\Models\FlashExamData;
use Illuminate\Support\Facades\Hash;
use Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
class HomeController extends Controller
{
    public function index()
    {
        $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
        $notice = HomepageManage::where('subMenuId','=',12 )->orderBy('id','desc')->latest()->take(4)->get();
        $ShabaInfo = HomepageManage::where('content_type', '=',2 )->orderBy('id','asc')->first();
        $comment = HomepageManage::where('content_type', '=',4 )->latest()->take(3)->get();
        $aboutAbacus = HomepageManage::where('content_type', '=',11 )->orderBy('id','asc')->first();
        $testimonial = HomepageManage::where('content_type', '=',10 )->orderBy('id','desc')->get();
        $abacusInfo = HomepageManage::where('content_type', '=',13 )->latest()->take(4)->get();
        $empowering = HomepageManage::where('content_type', '=',14 )->latest()->take(10)->get();
        $successlist1 = HomepageManage::where('content_type', '=',15 )->orderBy('id','asc')->take(1)->first();
        $successlist2 = HomepageManage::where('content_type', '=', 15)->orderBy('id', 'asc')->skip(1)->take(1)->first();
        $successlist3 = HomepageManage::where('content_type', '=',15 )->orderBy('id','asc')->skip(2)->take(1)->first();
        $successlist4 = HomepageManage::where('content_type', '=',15 )->orderBy('id','asc')->skip(3)->take(1)->first();
        $magicalImage = HomepageManage::where('content_type', '=',17 )->orderBy('id','asc')->take(1)->first();
       
        $video = Video::where('vStatus','Active')->orderBy('id','asc')->take(10)->get();
        

        $teacherList = MemberList::orderBy('id', 'desc')->latest()->take(8)->get();
        $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
        $importantLink = ImportantLink::where('linkstatus', '1')->orderBy('id', 'desc')->get();
        $allmessage = HomepageManage::where('subMenuId','=',13 )->orderBy('id','desc')->latest()->take(2)->get();


        $data['mediaGallery'] = content::where('id', '=',10 )->get()[0];
        $data['onlineVisitor'] = content::where('id', '=',11 )->get()[0];


        return view('frontend.index',compact('teacherList','magicalImage','aboutAbacus','successlist1','successlist2','successlist3','successlist4','video','empowering','testimonial','abacusInfo','comment','slide','notice','ShabaInfo','ga_info','video','importantLink','allmessage','data'));
    }
    public function teacherStudent($slug)
    {
        // return($slug);
       $name = DB::table('sub_menus')
                ->select('id')
                ->where('slug', $slug)
                ->first();
        if(9 == $name->id){
            $teacherList = MemberList::where('status', '=',1 )->orderBy('designation','asc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.memberlist',compact('teacherList','ga_info','slide'));
        }
        elseif(10 == $name->id){
            $className = ClassName::orderBy('id','asc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.class',compact('className','ga_info','slide'));
        }
        elseif(11 == $name->id){
            $currentYear = Date('Y');
            $previousYear = $currentYear - 5;
            $lastYear = StudentInformation::orderBy('session', 'desc')->take(1)->get();
            $data = StudentInformation::whereBetween('session', [$lastYear, $previousYear])->where('status', 1)->orderBy('id', 'desc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.oldstudentlist', compact( 'data', 'ga_info','slide'));
        }else{
            $dataWhatweDo = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.workingzone',compact('dataWhatweDo','ga_info','slide'));
        }

    }
    public function Student($id)
    {
        $studentInformation = StudentInformation::where('classnameId', '=', $id)->orderBy('id','asc')->get();
        $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
        $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
        return view('frontend.partners',compact('studentInformation','ga_info','slide'));
    }
    public function ReadMore($id)
    {
        $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
        $readMore = HomepageManage::find($id);
        $mission = HomepageManage::where('submenu_slug','=','mission' )->orderBy('id','asc')->first();
        $ShabaInfo = HomepageManage::where('content_type', '=',2 )->orderBy('id','asc')->first();
        $comment = HomepageManage::where('content_type', '=',4 )->latest()->take(3)->get();
        $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
        $working = Gallary::where('albume_type','=',1)->orderBy('id', 'desc')->latest()->take(3)->get();
        return view('frontend.homepage_readmore',compact('comment','slide','mission','readMore','ShabaInfo','ga_info','working'));
    }
    public function singleProfile($id)
    {
        $singleProfile = MemberList::find($id);
        $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
        $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
        return view('frontend.memberprofile',compact('singleProfile','ga_info','slide'));
    }
    public function partnersProfile($id)
    {
        $partnersview = StudentInformation::find($id);
        $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
        $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
        return view('frontend.partners_profile',compact('partnersview','ga_info','slide'));
    }
    public function mediaGallery($slug)
    {

        $mediaGallery = DB::table('sub_menus')
                    ->where('slug', $slug)
                    ->first();
        if(11 == $mediaGallery->id){
            $video = Video::where('vStatus','Active')->orderBy('id','desc')->get();
            return view('frontend.video',compact('video'));
        } elseif(10 == $mediaGallery->id) {
            $albums = Albume::orderBy('id','asc')->where('alstatus',1)->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->get();
            return view('frontend.gallary',compact('albums','ga_info'));
        } elseif(43 == $mediaGallery->id) {
            $albums = Albume::orderBy('id','asc')->where('alstatus',1)->get();
            $ga_info = Gallary::where('albume_slug', $slug )->orderBy('id', 'desc')->latest()->get();
            return view('frontend.graduation_ceremony',compact('albums','ga_info'));
        } else {
            $competition = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            $ga_info = Gallary::where('albume_slug', $slug )->orderBy('id', 'desc')->latest()->get();
            return view('frontend.competition',compact('competition','ga_info'));
        }
    }
    public function contactUs()
    {
        $BasicInfo = BasicInfo::first();
        return view('frontend.contract',compact('BasicInfo'));
    }

    public function aboutUs($slug)
    {
        $aboutus = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->first();
        $aboutceo = HomepageManage::where('submenu_slug', $slug)->orderBy('id', 'asc')->skip(1)->take(1)->first();
        return view('frontend.about',compact('aboutus','aboutceo'));
    
    }
    public function courseInfo($slug)
    {
    $courseInfo = DB::table('sub_menus')
            ->where('slug', $slug)
            ->first();
        if(36 == $courseInfo->id){
        $courseInfo = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
        return view('frontend.courseinfo',compact('courseInfo'));
    } else {
        $courseBenefit = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
        return view('frontend.course_benefit',compact('courseBenefit'));
    }
    }
    public function benefits($slug)
    {
        $resource = DB::table('sub_menus')
                ->where('slug', $slug)
                ->first();
        if(7 == $resource->id){
          $karzabli = HomepageManage::where('submenu_slug', $slug)->orderBy('id','asc')->get();
        return view('frontend.benefits',compact('karzabli'));
        } 
        elseif(37 == $resource->id) 
        {
        return view('frontend.addmission');
        } 
        elseif(44 == $resource->id) 
        {
            return view('frontend.marketing_login');
        }
        elseif(45 == $resource->id) 
        {
            $Center = FranchiseForm::where('type', '0' )->orderBy('id','asc')->get();
            $Interested = FranchiseForm::where('type', '1' )->orderBy('id','asc')->get();
            $AboutUs = FranchiseForm::where('type', '2' )->orderBy('id','asc')->get();
            $franchiseInfo = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->first();
            return view('frontend.franchise_interest_form',compact('Center','Interested','AboutUs','franchiseInfo'));
        }
        elseif(39 == $resource->id)
        {
            $feeStructure = HomepageManage::where('submenu_slug', 'fee-structure' )->orderBy('id','asc')->get();
            $traningInfo = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            return view('frontend.campuslist',compact('traningInfo','feeStructure'));
        } 
        else
        {
            $feeStructure = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
        return view('frontend.fee_structure',compact('feeStructure'));
        }

    }
    
    public function AreaName($id) {
        $data = SubArea::where('area_id', $id)->get();
        return response()->json($data);
      }

    public function MarketingLogin(Request $request)
    {
        if ($request->isMethod('post')) {
            $uname = $request->uname;
            $pswd = $request->pswd;

            $admissionLogin = MarketingLogin::where('user_name', $uname)->first();
            
            if ($admissionLogin && Hash::check($pswd, $admissionLogin->password)) {
                $Area = Area::where('status', 0)->orderBy('area_name', 'asc')->get();
                return view('frontend.marketing_form', compact('Area','admissionLogin'));
            } else {
                return redirect()->back()->with('message', 'Invalid username or password.');
            }
        } else {
            $Area = Area::where('status', 0)->orderBy('area_name', 'asc')->get();
            return view('frontend.marketing_form', compact('Area'));
        }
    }
   
    public function CompetionRegiForm()
    {

        $competitionText = HomepageManage::where('content_type', '=',18 )->orderBy('id','desc')->first();
       return view('frontend.compition_regi_form',compact('competitionText'));
         
    }
   
    public function CompetionLogin(Request $request)
    {

        if ($request->isMethod('post')) {
            $phone_number = $request->phone_number;
            $pswd = $request->password;

            $admissionLogin = CompetionRegiManage::where('phone_number', $phone_number)->first();
            
            if ($admissionLogin && Hash::check($pswd, $admissionLogin->password)) {
                $specialcategoryA2 = SpacialCategoryA2::orderBy('id', 'asc')->get();
                // return view('frontend.abacus_special_two', compact('admissionLogin','specialcategoryA2'));
                return view('frontend.competion_game_user', compact('admissionLogin'));
            } else {
                return redirect()->back()->with('message', 'Invalid username or password.');
            }
        } else {
            return view('frontend.compition_login_form');
        }
    }
   
    public function logout(Request $request)
    {
        Auth::guard('marketing')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return view('frontend.marketing_login');
    }
    public function CompetitionLogout(Request $request)
    {
        // Auth::guard('competition')->logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return view('frontend.compition_login_form');
    }
    
    public function showMarketingForm()
    {
        return redirect()->route('marketing.login')->with('message', 'You have been logged out.');
    }


    public function training($slug)
    {
        $Training = DB::table('sub_menus')
        ->where('slug', $slug)
        ->first();
        if(40 == $Training->id){
            $calendarevents = FullCalenderEvent::where('event_type','Training Schedule')->orderBy('id','desc')->get();
            $formattedEvents = [];

            foreach ($calendarevents as $event) {
                $start_date = new \DateTime($event->event_date); 
                $formattedEvents[] = [
                    'title' => $event->title_text,
                    'start' => $start_date->format('Y-m-d'), 
                    'description' => $event->title_text, 
                ];
            }
        return view('frontend.training', compact( 'formattedEvents'));   
        }
        else if(41 == $Training->id){
            $calendarevents = FullCalenderEvent::where('event_type','Calender of Event')->orderBy('id','desc')->get();
            $formattedEvents = [];

            foreach ($calendarevents as $event) {
                $start_date = new \DateTime($event->event_date); 
                $formattedEvents[] = [
                    'title' => $event->title_text,
                    'start' => $start_date->format('Y-m-d'), 
                    'description' => $event->title_text, 
                ];
            }
        return view('frontend.calendar_event', compact( 'formattedEvents'));   
        }
        else if(42 == $Training->id){
        $traningInfo = HomepageManage::where('submenu_slug', $slug )->orderBy('id','desc')->latest()->take(1)->get();
        return view('frontend.abacus_app',compact('traningInfo'));
        } 
        else if(48 == $Training->id){
        $traningInfo = HomepageManage::where('submenu_slug', $slug )->orderBy('id','desc')->latest()->take(1)->get();
        return view('frontend.compition_login_form',compact('traningInfo'));
        } 
        else if(47 == $Training->id){
            return view('frontend.abacus_app3');
        } 
        else {
        $traningInfo = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
        return view('frontend.calander',compact('traningInfo'));
        }
    }
    public function Addmission($slug)
    {
       

        $className = ClassName::orderBy('className','asc')->get();
        $addmission = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
        $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
        $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
        return view('frontend.addmission',compact('addmission','ga_info','className','slide'));

    }
    public function allNewsMessage($slug)
    {
     $boardnotic = DB::table('homepage_manages')
                        ->where('submenu_slug', $slug)
                        ->first();
        if($slug == $boardnotic){
            $video = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.video',compact('ga_info','video','slide'));
        } else {
            $allNewsMessage = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.publication',compact('allNewsMessage','ga_info','slide'));
        }
    }
    public function downloadCorner($slug)
    {
        $slugTeacher = DB::table('homepage_manages')
                        ->where('submenu_slug', $slug)
                        ->first();
        if($slug == $slugTeacher){
            $video = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.video',compact('ga_info','video','slide'));
        } else {
            $downlodeCorner = HomepageManage::where('submenu_slug', $slug )->orderBy('id','asc')->get();
            $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
            $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
            return view('frontend.downloadcorner',compact('downlodeCorner','ga_info','slide'));
        }
    }
 
  public function ViewFile($id){
    $viewFile = HomepageManage::find($id);
    $ga_info = Gallary::orderBy('id', 'desc')->latest()->take(4)->get();
    $slide = HomepageManage::where('content_type', '=',1 )->orderBy('id','desc')->get();
    return view('frontend.pdf_view', compact( 'viewFile', 'ga_info','slide'));
  }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'email' => 'required|email|max:255',

        ]);

        $data =
        [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
        ];
        contact::create($data);
        return redirect()->back()->with('success', 'Thank you! Message Sent successfully.');
    }
    public function Addmissiondd($slug){
        return("Hello");
    }
    public function NewApp()
    {

      return view('frontend.abacus_app3');
    
    }
    public function CompitionGame()
    {
        $compitionCategory = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.abacus_compition',compact('compitionCategory'));
    
    }
    public function SpecialOne()
    {
        $specialcategory = SpacialCategory::orderBy('id', 'asc')->get();
        $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.abacus_special_one', compact('specialcategory','historydata'));
    
    }
    public function VisualCompetition($id)
    {

      
        $CompetitioButton = CompetionStatus::orderBy('id','asc')->first();
        $CompetitioDatatable = CompetionStatus::orderBy('id','desc')->first();
        $userInfo = CompetionRegiManage::where('id',$id)->first();
        $admissionLogin = CompetionRegiManage::find($id);
        $CompetionRegiInfo = CompetionRegiManage::find($id);
        $birthDate = $CompetionRegiInfo->dateofbirth;
        $age = \Carbon\Carbon::parse($birthDate)->age; 
    
        if ($age >= 0 && $age <= 6) {
            $competitionStatus = SpecialExamData::where('cat_id', 1)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $GameTimeInfo = GameTime::where('level', '1')->orderBy('id','desc')->first();
            $SpacialCategoryA1 = SpacialCategory::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_special_one', compact('CompetionResult','SpacialCategoryA1','GameTimeInfo','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
        } elseif ($age >= 6 && $age <= 7) {
            $competitionStatus = SpecialExamData::where('cat_id', 2)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $GameTimeInfo = GameTime::where('level', '2')->orderBy('id','desc')->first();
            $SpacialCategoryA2 = SpacialCategoryA2::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_special_two', compact('CompetionResult','SpacialCategoryA2','GameTimeInfo','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
        } elseif ($age >= 7 && $age <= 8) {
            $competitionStatus = SpecialExamData::where('cat_id', 3)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $GameTimeInfo = GameTime::where('level', '3')->orderBy('id','desc')->first();
            $CategoryB1Level1 = CategoryB1Level1::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_cate_b1_level1', compact('CompetionResult','CategoryB1Level1','GameTimeInfo','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
        } elseif ($age >= 8 && $age <= 9) {
            $competitionStatus = SpecialExamData::where('cat_id', 4)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $GameTimeInfo = GameTime::where('level', '2')->orderBy('id','desc')->first();
            $CategoryB2Level1 = CategoryB2Level1::where('status' , 0)->orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_cate_b2_level1', compact('CompetionResult','CategoryB2Level1','GameTimeInfo','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
        } elseif ($age >= 9 && $age <= 10) {
            $competitionStatus = SpecialExamData::where('cat_id', 5)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $CompetitionCategoryLevel2 = CompetitionCategoryLevel2::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_level_two', compact('CompetionResult','CompetitionCategoryLevel2','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
    
        } elseif ($age >= 10 && $age <= 11) {
            $competitionStatus = SpecialExamData::where('cat_id', 6)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $CompetitionCategoryLevel3 = CategoryDLevel3::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_level_three', compact('CompetionResult','CompetitionCategoryLevel3','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
       
        } elseif ($age >= 11 && $age <= 12) {
            $competitionStatus = SpecialExamData::where('cat_id', 7)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $CompetitionCategoryLevel4 = CategoryELevel4::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_level_four', compact('CompetionResult','CompetitionCategoryLevel4','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
    
        } elseif ($age >= 12 && $age <= 13) {
            $competitionStatus = SpecialExamData::where('cat_id', 8)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $CompetitionCategoryLevel5 = CompetitionLevel5::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_level_five', compact('CompetionResult','CompetitionCategoryLevel5','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
    
        } elseif ($age >= 9 && $age <= 14) {
            $competitionStatus = SpecialExamData::where('cat_id', 9)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $CompetitionLevel6 = CompetitionLevel6::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_level_six', compact('CompetionResult','CompetitionLevel6','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
        } elseif ($age >= 14 && $age <= 15) {
            $competitionStatus = SpecialExamData::where('cat_id', 10)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $CompetitionLevel7 = CategoryHLevel7::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_level_seven', compact('CompetionResult','CompetitionLevel7','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
         
        } elseif ($age >= 15 && $age <= 16) {
            $competitionStatus = SpecialExamData::where('cat_id', 11)->where('user_id',$userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $CompetitionLevel8 = CategoryILevel8::orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_level_eight', compact('CompetionResult','CompetitionLevel8','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
         
        } else {
            $message = 'আপনার জন্ম তারিখ অনুযায়ী, গেমের শর্ত পূরণ হয়নি, তাই আপনি গেম খেলতে পারবেন না।';
            return view('frontend.competion_game_user', compact('admissionLogin', 'message'));
        }
    }
    

    // public function VisualCompetition($id)
    // {

    //     $CompetitioButton = CompetionStatus::orderBy('id','asc')->first();
    //     $CompetitioDatatable = CompetionStatus::orderBy('id','desc')->first();
    //     $gameMessage = HomepageManage::where('content_type', '=',20 )->orderBy('id','asc')->first();

    //     $admissionLogin = CompetionRegiManage::find($id);
    //     $CompetionRegiInfo = CompetionRegiManage::find($id);
    //     $userInfo = CompetionRegiManage::where('id',$id)->first();
     
    //     $birthDate = $CompetionRegiInfo->dateofbirth;
    //     $age = \Carbon\Carbon::parse($birthDate)->age; 
    
    //     if ($age >= 0 && $age <= 7) {
    //         $competitionStatus = SpecialExamData::where('cat_id', 1)->where('user_id',$userInfo->id)->first();
    //         $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
    //         $SpacialCategoryA2 = SpacialCategoryA2::orderBy('id', 'asc')->get();
    //         $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
    //         return view('frontend.abacus_special_two', compact('gameMessage','CompetionResult','SpacialCategoryA2','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
    //     } elseif ($age >= 7 && $age <= 9) {
    //         $competitionStatus = SpecialExamData::where('cat_id', 2)->where('user_id',$userInfo->id)->first();
    //         $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
    //         $CompetitionCategoryLevel2 = CompetitionCategoryLevel2::orderBy('id', 'asc')->get();
    //         $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
    //         return view('frontend.abacus_level_two', compact('gameMessage','CompetionResult','CompetitionCategoryLevel2','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
    //     } elseif ($age >= 9 && $age <= 14) {
    //         $competitionStatus = SpecialExamData::where('cat_id', 3)->where('user_id',$userInfo->id)->first();
    //         $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
    //         $CompetitionLevel6 = CompetitionLevel6::orderBy('id', 'asc')->get();
    //         $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
    //         return view('frontend.abacus_level_six', compact('gameMessage','CompetionResult','CompetitionLevel6','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
    //         // $CompetitionLevel5 = CompetitionLevel5::orderBy('id', 'asc')->get();
    //         // $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
    //         // return view('frontend.abacus_level_five', compact('CompetitionLevel5','CompetitioButton','CompetitioDatatable','historydata'));
    
    //     } else {
    //         $message = 'আপনার জন্ম তারিখ অনুযায়ী, গেমের শর্ত পূরণ হয়নি, তাই আপনি গেম খেলতে পারবেন না।';
    //         return view('frontend.competion_game_user', compact('admissionLogin', 'message'));
    //     }
    // }
    public function FlashCompetition($id)
    {

        $CompetitioButton = CompetionStatus::orderBy('id','asc')->first();
        $CompetitioDatatable = CompetionStatus::orderBy('id','desc')->first();
        $gameMessage = HomepageManage::where('content_type', '=',20 )->orderBy('id','asc')->first();
       
        $admissionLogin = CompetionRegiManage::find($id);
        $CompetionRegiInfo = CompetionRegiManage::find($id);
        $userInfo = CompetionRegiManage::where('id',$id)->first();
      
        $birthDate = $CompetionRegiInfo->dateofbirth;
        $age = \Carbon\Carbon::parse($birthDate)->age; 
    
        if ($age >= 0 && $age <= 7) {
            $competitionStatus = FlashExamData::where('cat_id', 1)->where('user_id', $userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $FlashLevel1 = FlashCompetition::where('category', 1)->orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_flash_level_one', compact('gameMessage','CompetionResult','FlashLevel1','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
        } elseif ($age >= 7 && $age <= 9) {
            $competitionStatus = FlashExamData::where('cat_id', 2)->where('user_id', $userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $FlashLevel2 = FlashCompetition::where('category', 2)->orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_flash_level_two', compact('gameMessage','CompetionResult','FlashLevel2','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
    
        } elseif ($age >= 9 && $age <= 14) {
            $competitionStatus = FlashExamData::where('cat_id', 3)->where('user_id', $userInfo->id)->first();
            $CompetionResult = $competitionStatus ? $competitionStatus->status : null;
            $FlashLevel6 = FlashCompetition::where('category', 6)->orderBy('id', 'asc')->get();
            $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            return view('frontend.abacus_flash_level_six', compact('gameMessage','CompetionResult','FlashLevel6','CompetitioButton','CompetitioDatatable','historydata','CompetionRegiInfo'));
            // $CompetitionLevel5 = CompetitionLevel5::orderBy('id', 'asc')->get();
            // $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
            // return view('frontend.abacus_level_five', compact('CompetitionLevel5','CompetitioButton','CompetitioDatatable','historydata'));
    
        } else {
            $message = 'আপনার জন্ম তারিখ অনুযায়ী, গেমের শর্ত পূরণ হয়নি, তাই আপনি গেম খেলতে পারবেন না।';
            return view('frontend.competion_game_user', compact('admissionLogin', 'message'));
        }
    }
    
    public function specialTwo($id)
    {
        $CompetionRegiInfo= CompetionRegiManage::find($id);
        $CompetitionCategoryLevel2 = SpacialCategoryA2::orderBy('id', 'asc')->get();
        $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.abacus_special_two', compact('CompetitionCategoryLevel2','historydata','CompetionRegiInfo'));
    
    }
    public function Level2()
    {
        // $CompetionRegiInfo= CompetionRegiManage::find($id);
        $CompetitionCategoryLevel2 = CompetitionCategoryLevel2::orderBy('id', 'asc')->get();
        $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.abacus_level_two', compact('CompetitionCategoryLevel2','historydata'));
    
    }
    public function Level5()
    {
        // $CompetionRegiInfo= CompetionRegiManage::find($id);
        $CompetitionCategoryLevel2 = CompetitionCategoryLevel2::orderBy('id', 'asc')->get();
        $historydata = CompitionCategory::where('status',0)->orderBy('id','asc')->get();
        return view('frontend.abacus_level_five', compact('CompetitionCategoryLevel2','historydata'));
    
    }
}

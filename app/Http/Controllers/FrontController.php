<?php

namespace App\Http\Controllers;

use App\AcademicCalender;
use App\AdmissionFee;
use App\Album;
use App\AppliedStudent;
use App\Bank;
use App\Classes;
use App\ClassSchedule;
use App\ExamResult;
use App\Feature;
use App\Gallery;
use App\GalleryCategory;
use App\Group;
use App\ImportantLink;
use App\Mark;
use App\Menu;
use App\MeritList;
use App\Notice;
use App\NoticeCategory;
use App\Page;
use App\Playlist;
use App\Repository\FrontRepository;
use App\Session;
use App\Slider;
use App\Staff;
use App\Student;
use App\Syllabus;
use App\UpcomingEvent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

    private $repository;

    public function __construct(FrontRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $sliders = Slider::query()
            //->where('start','<',Carbon::today())
            ->where(function($query){
                $query->where('start','<',Carbon::today())->orWhere('start',null);
            })
            //->where('end','>',Carbon::today())
            ->where(function($query){
                $query->where('end','>',Carbon::today())->orWhere('end',null);
            })
            ->where('active',1)
            ->get();
        $content = Page::all();
        $teachers = Staff::all();
        $links = ImportantLink::all();
        $notices = Notice::all()->sortByDesc('start')->take(5);
        $events = UpcomingEvent::query()
            ->where('date','>',Carbon::yesterday())
            ->orderBy('date')
            ->take(3)
            ->get();
        $newses = Notice::query()->where('notice_type_id',1)->orderByDesc('start')->skip(1)->take(3)->get();
        $latestNews = Notice::query()->where('notice_type_id',1)->orderByDesc('start')->first();
        $features = Feature::query()->where('active',1)->take(6)->get();

        //return view('front.index-navy');
        return view('front.index',compact('sliders','content','teachers','links','notices','events','newses','latestNews','features'));
    }

    public function introduction()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.introduction',compact('content'));
    }

    public function governing_body()
    {
        $content = Page::query()->where('name','governing body')->first();
        return view('front.pages.governing-body',compact('content'));
    }

    public function donor()
    {
        $content = Page::query()->where('name','founder & donor')->first();
        return view('front.pages.founder-n-donor',compact('content'));
    }

    public function principal()
    {
        $content = Page::query()->where('name','principal message')->first();
        return view('front.pages.principal',compact('content'));
    }
    public function president()
    {
        $content = Page::query()->where('name','president message')->first();
        return view('front.pages.president',compact('content'));
    }

//Institute -> infrastructure ---Start
    public function building_room()
    {
        $content = Page::query()->where('name','building & rooms')->first();
        return view('front.pages.building-n-room',compact('content'));
    }

    public function library()
    {
        $content = Page::query()->where('name','library')->first();
        return view('front.pages.library',compact('content'));
    }

    public function transport()
    {
        $content = Page::query()->where('name','transport')->first();
        return view('front.pages.transport',compact('content'));
    }

    public function hostel()
    {
        $content = Page::query()->where('name','hotel')->first();
        return view('front.pages.hostel',compact('content'));
    }

    public function land_information()
    {
        $content = Page::query()->where('name','land information')->first();
        return view('front.pages.land-information',compact('content'));
    }
//Institute -> infrastructure ---Start

//Institute -> Academic ---START
    public function class_routine()
    {
        $classes = ClassSchedule::query()
            //->where('academic_class_id',$classId)
            ->get()
            //->sortBy('start')
            //->groupBy('day_id')
            //->sortBy('day_id')
            ->groupBy('academic_class_id');

        return view('front.pages.class-routine',compact('classes'));
    }
    public function calender()
    {
        $content = Page::query()->where('name','calendar')->first();
        $data = AcademicCalender::query()->orderBy('start')->get();

        return view('front.pages.calender',compact('content','data'));
    }
    public function syllabus()
    {
        //$content = Page::query()->where('name','syllabus')->first();
        $syllabuses = Syllabus::all();
        return view('front.pages.syllabus',compact('syllabuses'));
    }
    public function diary()
    {
        $content = Page::query()->where('name','diary')->first();
        return view('front.pages.diary',compact('content'));
    }
    public function performance()
    {
        $content = Page::query()->where('name','performance')->first();
        return view('front.pages.performance',compact('content'));
    }
    public function holiday()
    {
        $content = Page::query()->where('name','annual holiday')->first();
        return view('front.pages.annual-holiday',compact('content'));
    }
//Institute -> Academic ---END

//Institute -> Digital Campus --START
    public function multimedia_classroom()
    {
        $content = Page::query()->where('name','multimedia class room')->first();
        return view('front.pages.multimedia-class-room',compact('content'));
    }
    public function computer_lab()
    {
        $content = Page::query()->where('name','computer lab')->first();
        return view('front.pages.computer-lab',compact('content'));
    }
    public function science_lab()
    {
        $content = Page::query()->where('name','science lab')->first();
        return view('front.pages.science-lab',compact('content'));
    }
//Institute -> Digital Campus ---END

//TEAM -> --START
    public function managing_committee()
    {
        $content = Page::query()->where('name','managing committee')->first();
        return view('front.pages.managing-committee',compact('content'));
    }
    public function teacher()
    {
        $content = Page::query()->where('name','teachers')->first();
        $teachers = Staff::query()->where('staff_type_id',2)->orderBy('code')->get();
        return view('front.pages.teacher',compact('content','teachers'));
    }
    public function staff()
    {
        $content = Page::query()->where('name','staff')->first();
        $staffs = Staff::query()->where('staff_type_id',1)->get();
        return view('front.pages.staff',compact('content','staffs'));
    }
    public function wapc()
    {
        $content = Page::query()->where('name','wapc')->first();
        return view('front.pages.wapc',compact('content'));
    }
    public function tswt()
    {
        $content = Page::query()->where('name','teacher staff welfare trust')->first();
        return view('front.pages.tswt',compact('content'));
    }
    public function tci()
    {
        $content = Page::query()->where('name','teacher council information')->first();
        return view('front.pages.teacher-council-information',compact('content'));
    }
//TEAM -> --END


//RESULT -> --START
    public function internal_exam(Request $request)
    {
        if($request->all()){
            $sessionId = $request->get('session_id');
            $examId = $request->get('exam_id');
            $studentId = Student::query()
                ->where('studentId',$request->get('student'))
                ->pluck('id');

            if($studentId->count() == 0){
                return redirect()->back()->with('msg','NO STUDENT FOUND!');
            }

            $result = ExamResult::query()
                ->where('session_id',$sessionId)
                ->where('exam_id',$examId)
                ->where('student_id',$studentId)
                ->latest()->first();

            $marks = Mark::query()
                //->where('session_id',$sessionId)
                ->where('exam_id',$examId)
                ->where('student_id',$studentId)
                ->join('subjects','subjects.id','=','marks.subject_id')
                ->select('marks.*','subjects.level')
                ->orderBy('level')
                ->get();
        }else{
            $result = null;
            $marks = null;
        }

        $repository = $this->repository;
        return view('front.pages.internal-exam',compact('result','marks','repository'));
    }
    public function public_exam()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.public-exam',compact('content'));
    }
    public function admission()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.admission',compact('content'));
    }
//RESULT -> --END

//INFORMATION -> --START
    public function sports_n_culture_program()
    {
        $content = Page::query()->where('name','sports and cultural program')->first();
        return view('front.pages.sports-n-culture-program',compact('content'));
    }
    public function center_information()
    {
        $content = Page::query()->where('name','center information')->first();
        return view('front.pages.center-information',compact('content'));
    }
    public function scholarship_info()
    {
        $content = Page::query()->where('name','scholarship info')->first();
        return view('front.pages.scholarship-info',compact('content'));
    }
    public function bncc()
    {
        $content = Page::query()->where('name','bncc')->first();
        return view('front.pages.bncc',compact('content'));
    }
    public function scout()
    {
        $content = Page::query()->where('name','scouts')->first();
        return view('front.pages.scouts',compact('content'));
    }
    public function tender()
    {
        $content = Page::query()->where('name','tender')->first();
        return view('front.pages.tender',compact('content'));
    }
//INFORMATION -> --END

//ATTENDANCE -> --START
    public function attendance_summery()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.attendance-summery',compact('content'));
    }
    public function student_attendance()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.student-attendance',compact('content'));
    }
    public function teacher_attendance()
    {
        $content = Page::query()->where('name','introduction')->first();
        return view('front.pages.teacher-attendance',compact('content'));
    }
//ATTENDANCE -> --END

//News & Notice Start...
    public function notice()
    {
        $notices = Notice::query()
            ->where('notice_type_id',2)
            //->where('start','<',Carbon::today())
            //->where('end','>',Carbon::today())
            ->orderByDesc('start')
            ->get();
        //->paginate(5);

        $categories = NoticeCategory::all();
        return view('front.pages.notice',compact('notices','categories'));
    }
    public function noticeDetails($id)
    {
        $notice = Notice::query()->findOrFail($id);
        $categories = NoticeCategory::all();
        return view('front.pages.notice-details',compact('notice','categories'));
    }

    public function news()
    {
        $newses = Notice::query()
            ->where('notice_type_id',1)
            //->where('start','<',Carbon::today())
            //->where('end','>',Carbon::today())
            ->orderByDesc('start')
            ->paginate(5);
        $categories = NoticeCategory::all();
        return view('front.pages.news',compact('newses','categories'));
    }

    public function newsDetails($id)
    {
        $news = Notice::query()->findOrFail($id);
        $categories = NoticeCategory::all();
        return view('front.pages.news-details',compact('news','categories'));
    }

//News & Notice END...

//Gallery
    public function gallery()
    {
        $categories = GalleryCategory::all();
        $albums = Album::all();
        return view('front.pages.gallery',compact('categories','albums'));
    }

    public function album($id)
    {
        $album = Album::query()->findOrFail($id);
        $images = Gallery::query()->where('album_id',$id)->get();
        return view('front.pages.album',compact('images','album'));
    }
    //Gallery -> END

    // Download Start
    public function download()
    {
        $content = Page::query()->where('name','download')->first();
        return view('front.pages.download',compact('content'));
    }
    // Download ENd

    // Contact Start
    public function contact()
    {
        $content = Page::query()->where('name','contacts')->first();
        return view('front.pages.contacts',compact('content'));
    }
    // Contact End

    public function validateAdmission()
    {
        return view('front.admission.validate-admission');
    }

    public function admissionForm(Request $request)
    {
        $this->validate($request,[
            'ssc_roll' => 'required|numeric|exists:merit_lists'
        ]);

        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        $group = MeritList::query()->where('ssc_roll',$request->get('ssc_roll'))->first()->group_id;

        $compulsory = DB::table('online_subjects')
            ->where('type',1)
            ->pluck('name','id');
        $selective = DB::table('online_subjects')
            ->where('type','like','%2%')
            ->where('group_id',$group)
            ->pluck('name','id');
        $optional = DB::table('online_subjects')
            ->where('type','like','%3%')
            ->where('group_id',$group)
            ->pluck('name','id');

        $repository = $this->repository;

        if($student){
            if($student->approved){
                return view('front.admission.admission-block-form',compact('repository','student','compulsory','selective','optional'));
            }
            return view('front.admission.admission-edit-form',compact('repository','student','compulsory','selective','optional'));
        }

        return view('front.admission.admission-form',compact('repository','compulsory','selective','optional'));
    }

    public function admissionSuccess(Request $request)
    {
        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        return view('front.admission.admission-success',compact('student'));
    }

    public function studentForm(Request $request)
    {
        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        $subjects = json_decode($student->subjects);

        return view('front.admission.student-form',compact('student','subjects'));
    }

    public function invoice(Request $request)
    {
        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        $categories = AdmissionFee::query()->where('group_id',$student->group_id)->get();

        $banks = Bank::all();

        $bank = Bank::query()->first();

        return view('front.admission.invoice',compact('categories','student','banks','bank'));
    }

    public function bankSlip(Request $request)
    {
        $student = Student::query()
            ->where('ssc_roll',$request->get('ssc_roll'))
            ->first();

        return view('front.admission.bank-slip',compact('student'));
    }

    public function loadStudentInfo(Request $request){
        //$academicYear = substr(trim(Session::query()->where('id',$request->academicYear)->first()->year),-2);
        $academicYear = 2020;
        $incrementId = Student::query()->max('id');
        $increment = $incrementId + 1;
        $studentId = 'S'.$academicYear.$increment;

        $ssc_roll = $request->get('ssc_roll');

        $student = MeritList::query()->where('ssc_roll',$ssc_roll)->first();
        $name = $student->name;
        $session_id = $student->session_id;
        $class_id = $student->class_id;
        $group_id = $student->group_id;

        $session = Session::query()->findOrFail($session_id)->year;
        $classes = Classes::query()->findOrFail($class_id)->name;
        $groups = Group::query()->findOrFail($group_id)->name;

        return response([
            'studentId' => $studentId,
            'ssc_roll' => $ssc_roll,
            'name' => $name,
            'session_id' => $session_id,
            'class_id' => $class_id,
            'group_id' => $group_id,
            'session' => $session,
            'classes' => $classes,
            'groups' => $groups,
            'ssc_year' => $student->passing_year,
            'ssc_board' => $student->board,
        ]);
    }

    public function events()
    {
        $event = UpcomingEvent::query()->latest('date')->first();
        $events = UpcomingEvent::query()->latest('date')->get()->skip(1);
        return view('front.pages.events',compact('event','events'));
    }

    public function event($id)
    {
        $event = UpcomingEvent::query()->findOrFail($id);
        return view('front.pages.event',compact('event'));
    }

    public function playlists()
    {
        $playlists = Playlist::query()->paginate(25);
        return view('front.pages.playlists',compact('playlists'));
    }

    public function playlist($id)
    {
        $playlist = Playlist::query()->findOrFail($id);
        return view('front.pages.playlist',compact('playlist'));
    }

    public function page($uri,Request $request)
    {
        $content = Menu::query()->where('uri',$uri)->first();

        if($content->type == 3){

            $notices = null;
            $categories = null;

            $teachers = null;

            $staffs = null;

            $albums = null;

            $repository = $this->repository;

            if($content->system_page == 'gallery'){
                $categories = GalleryCategory::all();
                $albums = Album::all();
            }

            if($content->system_page == 'teacher' || $content->system_page == 'teacher-1'){
                $teachers = Staff::query()
                    ->where('staff_type_id',2)
                    ->orderBy('code')
                    ->get();
            }

            if($content->system_page == 'staff' || $content->system_page == 'staff-1'){
                $staffs = Staff::query()->where('staff_type_id',1)->orderBy('code')->get();
            }

            if($content->system_page === 'notice'){
                $notices = Notice::query()
                    ->where('notice_type_id',2)
                    ->orderByDesc('start')
                    ->get();
                $categories = NoticeCategory::all();
            }

            if($content->system_page === 'playlists'){
                $playlists = Playlist::query()->get();
                return view('front.pages.'.$content->system_page,compact('playlists'));
            }

            if($content->system_page === 'internal-result'){
                $this->internal_exam($request);
            }

            return view('front.pages.'.$content->system_page,compact('categories','albums','teachers','notices','staffs','repository'));
        }
        $page = $content->page;

        $page = $page ?? new Page;

        return view('front.pages.page',compact('page'));
    }

    // API for Vue
    public function infoBar()
    {
        $info = [
            'email' => siteConfig('email'),
            'phone' => siteConfig('phone'),
            'eiin' => siteConfig('eiin'),
            'code' => siteConfig('institute_code')
        ];

        return response($info);
    }
    public function titleBar()
    {
        $info = [
            'bg_color' => themeConfig('header_background'),
            'name' => siteConfig('name'),
            'name_size' => siteConfig('name_size'),
            'name_font' => siteConfig('name_font'),
            'name_color' => siteConfig('name_color'),
            'bn' => siteConfig('bn'),
            'bn_size' => siteConfig('bn_size'),
            'bn_font' => siteConfig('bn_font'),
            'bn_color' => siteConfig('bn_color'),
            'logo' => siteConfig('logo'),
            'logo_height' => siteConfig('logo_height')
        ];

        return response($info);
    }

    public function menuBar()
    {
        $info = [
            'bg_color' => themeConfig('header_background'),
            'name' => siteConfig('name'),
            'name_size' => siteConfig('name_size'),
            'name_font' => siteConfig('name_font'),
            'name_color' => siteConfig('name_color'),
            'bn' => siteConfig('bn'),
            'bn_size' => siteConfig('bn_size'),
            'bn_font' => siteConfig('bn_font'),
            'bn_color' => siteConfig('bn_color'),
            'logo' => siteConfig('logo'),
            'logo_height' => siteConfig('logo_height')
        ];

        return response($info);
    }
}


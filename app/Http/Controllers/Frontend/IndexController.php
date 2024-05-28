<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Course;
use App\Models\Course_goal;
use App\Models\CourseSection;
use App\Models\CourseLecture;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function CourseDetails($id, $slug){
        $course = Course::find($id);
        $goals = Course_goal::where('course_id',$id)->orderBy('id','DESC')->get();
        $ins_id = $course->instructor_id;
        $instructorCourse = Course::where('instructor_id',$ins_id)->orderBy('id','DESC')->get();

        $categories = Category::latest()->get();

        $cate_id = $course->category_id;
        $relatedCourse = Course::where('category_id',$cate_id)->where('id','!=',$id)->orderBy('id','DESC')->limit(3)->get();

        return view('frontend.course.course_details', compact('course','goals','instructorCourse','categories','relatedCourse'));
    }//end method


    public function CategoryCourse($id,$slug){

        $course = Course::where('category_id',$id)->where('status',1)->get();
        $category = Category::where('id',$id)->first();

        $categories = Category::latest()->get();

        return view('frontend.category.category_all', compact('course','category','categories'));


    }//end method

}

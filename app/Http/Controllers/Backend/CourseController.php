<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Course;
use App\Models\Course_goal;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;


class CourseController extends Controller
{
    public function AllCourse(){
        $id = Auth::user()->id;
        $course = Course::where('instructor_id',$id)->orderBy('id','DESC')->get();
        return view('instructor.course.all_course', compact('course'));
    } //end method

    public function AddCourse(){
        $category = Category::latest()->get();
        return view('instructor.course.add_course', compact('category'));
    }// end method

    public function GetSubCategory($category_id){
        $subcategory = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcategory);
    }
}

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
use Carbon\Carbon;

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
    }//end course

    public function StoreCourse(Request $request){
        $request->validate([
            'video'         => 'required|mimes:mp4|max:10000',
        ]);

        // image
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).".".$request->file('course_image')->getClientOriginalExtension();

        $img = $manager->read($request->file('course_image'));
        $img = $img->resize(370,246);

        $img->toJpeg(80)->save(base_path('public/upload/course/thumbnail/'.$name_gen));
        $save_url = 'upload/course/thumbnail/'.$name_gen;
        // end image

        // video
        $manager1 = new ImageManager(new Driver());
        $video_name = hexdec(uniqid()).".".$request->file('video')->getClientOriginalExtension();
        $video = $manager1->read($request->file('video'));

        $video->move(base_path('public/upload/course/video/'.$video_name));
        $save_video = 'upload/course/video/'.$video_name;
        // end video

        $course_id = Course::insertGetId([
            'category_id'                       => $request->category_id,
            'subcategory_id'                    => $request->subcategory_id,
            'instructor_id'                     => Auth::user()->id,
            'course_title'                      => $request->course_title,
            'course_name'                       => $request->course_name,
            'categocourse_name_slugry_id'       => strtolower(str_replace(' ','-',$request->course_name)),
            'description'                       => $request->description,
            'video'                             => $save_video,
            'course_image'                      => $save_url,
            'label'                             => $request->label,
            'duration'                          => $request->duration,
            'resources'                         => $request->resources,
            'certificate'                       => $request->certificate,
            'selling_price'                     => $request->selling_price,
            'discount_price'                    => $request->discount_price,
            'prerequisites'                     => $request->prerequisites,
            'bestseller'                        => $request->bestseller,
            'featured'                          => $request->featured,
            'selhighestratedling_price'         => $request->highestrated,
            'status'                            => 1,
            'created_at'                        => Carbon::now(),
        ]);

        // course Goals add form
        $goals = Count($request->goal_name);
        if($goals != NULL){
            for($i = 0; $i < $goals; $i++){
                $gcount = new Course_goal();
                $gcount->course_id = $course_id;
                $gcount->goal_name = $request->goal_name[$i];
                $gcount->save();
            };
        };
        // end form

        $notification = array(
            'message'       => 'Course inserted Successfully.',
            'alert-type'    => 'success'
        );
        return redirect()->route('all-course')->with($notification);


    }//end method
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class CategoryController extends Controller
{
    public function AllCategories(){
        $category = Category::latest()->get();
        return view('admin.backend.category.all_category',compact('category'));
    } //end method

    public function AddCategories(){
        return view('admin.backend.category.add_category');
    } //end method

    public function StoreCategories(Request $request){

        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).".".$request->file('image')->getClientOriginalExtension();

            $img = $manager->read($request->file('image'));
            $img = $img->resize(370,246);

            $img->toJpeg(80)->save(base_path('public/upload/category/'.$name_gen));
            $save_url = 'upload/category/'.$name_gen;

            Category::insert([
                'category_name'     => $request->category_name,
                'category_slug'     => strtolower(str_replace(' ','-',$request->category_name)),
                'image'             => $save_url,
            ]);
        } //end if

        $notification = array(
            'message'       => 'Category inserted Successfully.',
            'alert-type'    => 'success'
        );

        return redirect()->route('all-categories')->with($notification);

    } //end method

    public function EditCategories($id){
        $category = Category::find($id);
        return view('admin.backend.category.edit_category',compact('category'));
    } //end method

    public function UpdateCategories(Request $request){
        $cate_id = $request->id;
        if($request->file('image')){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).".".$request->file('image')->getClientOriginalExtension();

            $img = $manager->read($request->file('image'));
            $img = $img->resize(370,246);

            $img->toJpeg(80)->save(base_path('public/upload/category/'.$name_gen));
            $save_url = 'upload/category/'.$name_gen;

            Category::find($cate_id)->update([
                'category_name'     => $request->category_name,
                'category_slug'     => strtolower(str_replace(' ','-',$request->category_name)),
                'image'             => $save_url,
            ]);

            $notification = array(
                'message'       => 'Category updated with image successfully.',
                'alert-type'    => 'success'
            );

            return redirect()->route('all-categories')->with($notification);

        }else{
            Category::find($cate_id)->update([
                'category_name'     => $request->category_name,
                'category_slug'     => strtolower(str_replace(' ','-',$request->category_name)),
            ]);

            $notification = array(
                'message'       => 'Category updated without image successfully.',
                'alert-type'    => 'success'
            );

            return redirect()->route('all-categories')->with($notification);
        } //end if

    } //end method

    public function DeleteCategories($id){
        $item = Category::find($id);
        $img = $item->image;
        unlink($img);
        Category::find($id)->delete();
            $notification = array(
                'message'       => 'Category deleted successfully.',
                'alert-type'    => 'success'
            );
            return redirect()->back()->with($notification);
    } //end method

    ////////////// All SubSategory /////////////////////
    public function AllSubCategories(){
        $subcategory = SubCategory::latest()->get();
        return view('admin.backend.subcategory.all_subcategory',compact('subcategory'));
    } //end method

    public function AddSubCategories(){
        $category = Category::latest()->get();
        return view('admin.backend.subcategory.add_subcategory', compact('category'));
    } // end method

    public function StoreSubCategories(Request $request){

        SubCategory::insert([
            'category_id'           => $request->category_id,
            'subcategory_name'      => $request->subcategory_name,
            'subcategory_slug'      => strtolower(str_replace(' ','-',$request->subcategory_name)),
        ]);

        $notification = array(
            'message'       => 'Subategory inserted successfully.',
            'alert-type'    => 'success'
        );

        return redirect()->route('all-subcategories')->with($notification);
    } //end method

    public function EditSubCategories($id){
        $category = Category::latest()->get();
        $subcategory = SubCategory::find($id);
        return view('admin.backend.subcategory.edit_subcategory',compact('category','subcategory'));
    } //end method

    public function UpdateSubCategories(Request $request){
        $subcategoryId = $request->id;
        SubCategory::find($subcategoryId)->update([
            'category_id'           => $request->category_id,
            'subcategory_name'      => $request->subcategory_name,
            'subcategory_slug'      => strtolower(str_replace(' ','-',$request->subcategory_name)),
        ]);

        $notification = array(
            'message'       => 'Subategory updated successfully.',
            'alert-type'    => 'success'
        );

        return redirect()->route('all-subcategories')->with($notification);
    } //end method

    public function DeleteSubCategories($id){
        SubCategory::find($id)->delete();
        $notification = array(
            'message'       => 'Subategory deleted successfully.',
            'alert-type'    => 'success'
        );

        return redirect()->back()->with($notification);

    }
}

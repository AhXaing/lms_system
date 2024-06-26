<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Course;
use App\Models\User;
use App\Models\Wishlist;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WishListController extends Controller
{
    public function AddToWishList(Request $request, $course_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id', Auth::id())->where('course_id',$course_id)->first();

            if(!$exists){
                Wishlist::insert([
                    'user_id'       => Auth::id(),
                    'course_id'     => $course_id,
                    'created_at'    => Carbon::now()
                ]); 
                return response()->json(['success' => 'Successfully added on your wishlist']);
            }else{
                return response()->json(['error' => 'This product has already on your wishlist']);
            }
        }else{
            return response()->json(['error' => 'At First Login Your Account']);
        }
    }

    public function AllWishlist(){
        
    }
}

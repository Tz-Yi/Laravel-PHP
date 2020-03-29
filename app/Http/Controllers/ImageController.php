<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Images;
use Image;

class ImageController extends Controller
{

  function update(Request $request) {
    $user = Auth::user();
    $request->validate([
      'image' => 'required|image|max:4096'
     ]);

     $image_file = $request->image;
     $image = Image::make($image_file)->resize(32, 32);
     // Response::make($image->encode('jpeg'));

     Images::where('name', $user->name)
                ->update(array('image' => $image->encode('jpeg')));

     return redirect('user-profile')->with('success', 'Image store in database successfully');
  }

  function fetch() {
    $user = Auth::user();
    $image = $user->image;
    $image_file = Image::make($image);
    $response = Response::make($image_file->encode('jpeg'));
    $response->header('Content-Type', 'image/jpeg');
    return $response;
  }

  /* Router
  */
  public function index() {
    return view('pages.user-profile');
  }
}

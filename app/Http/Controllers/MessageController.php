<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Messages;
use App\Rules\Captcha;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get Messages
     *
     * @return view('messages.pagination')
    **/

    public function getMessages()
    {
      $messages = DB::table('messages')
                        ->join('users', 'messages.name', '=', 'users.id')
                          ->select('messages.id', 'users.name', 'users.email', 'users.image', 'messages.content')
                            ->orderBy('messages.created_at', 'desc')
                              ->paginate(5);
      // $messages = Messages::orderBy('created_at', 'desc')->get();
      return view('pages.messageBoard')->with('messages', $messages);
    }

    /**
     * Upload Message
     *
     * @return void
    **/

    public function uploadMessage(Request $request)
    {
      $user = Auth::user();
      // TODO: Validation
      $validation = $request->validate([
        'content' => 'required|string',
        'g-recaptcha-response' => new Captcha(),
      ]);

      // TODO: Error Redirect

      // TODO: Insert current message
      $message = array(
        'name' => $user->id,
        'content' => $request->content
      );
      Messages::create($message);

      return redirect('/messageBoard');
    }

    /**
     *
     * Delete Message (id)
     *
     * @return void
    **/

    public function deleteMessage(Request $request)
    {
      // Debugger Tools
      // dd($request->all());
      $user = Auth::user();
      // TODO: Validation
      $validation = $request->validate([
        'id' => 'required',
      ]);

      $message = DB::table('messages')
                      ->where('name', $user->id)
                          ->where('id', $request->id)->get();

      if (count($message)) {
        // TODO: Delete current message
        Messages::where('id', $request->id)
                    ->delete();
      } else {
        // TODO: Error Redirect
      }

      return redirect('/messageBoard');
    }
}

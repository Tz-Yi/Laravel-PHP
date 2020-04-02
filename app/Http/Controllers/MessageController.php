<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Messages;

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
      $messages = Messages::orderBy('created_at', 'desc')->get();
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
        'content' => 'required'
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
      $user = Auth::user();
      // TODO: Validation
      $validation = $request->validate([
        'id' => 'required',
        'content' => 'required'
      ]);

      // TODO: Error Redirect

      // TODO: Delete current message
      Messages::where('id', $request->id)
                  ->where('name', $user->id)
                    ->where('content', $request->content)
                      ->delete();

      return redirect('/messageBoard', 'MessageController@getMessages');
    }
}

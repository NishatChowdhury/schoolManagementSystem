<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
   public function __construct()
   {
       $this->middleware('auth');
   }

   public function index()
   {
       $messages = Message::query()->where('deleted_at',null)->orderBy('id','desc')->get();
       return view('admin.message.index',compact('messages'));

   }

   public function store(Request $request)
   {
       $this->validate($request,[
           'name'       => 'required|min:4',
           'email'      => 'required|email',
           'phone'      => 'required',
           'message'    => 'required'
       ],[]);

       Message::create($request->all());

       return redirect('/contact')->with('success','Your Message Send....');
   }

   public function destroy($id)
   {
       $data = Message::query()->findOrFail($id);
       $data->delete();
       return redirect('message-index');
   }

   public function view(Request $request)
   {
       $data = Message::query()->findOrFail($request->id);
       //dd($data);
       return $data;
   }
}

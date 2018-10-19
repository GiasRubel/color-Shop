<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;

class ContactController extends Controller
{
    public function index()
    {
    	return view('new_view.contact');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [

    		'name' => 'required|min:3|regex:/^[A-Za-z\s-_]+$/',
    		'email'   => 'required|E-Mail',
    		'subject' => 'min:3',
    		'message' => 'required|min:5'
    	]); 

    	$data = [
    		'name' => $request->name,
    		'email' => $request->email,
    		'subject' => $request->subject,
    		'bodyMassage' => $request->message
    	];

    	mail::send('new_view.emailFormat', $data, function($message) use ($data){
    		$message->from($data['email']);
    	    $message->to('gias.rubel.gggg@gmail.com');
    	    $message->subject($data['subject']);
    	});

    	return redirect()->back();
    }
}

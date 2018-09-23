<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUs;
use Mail;

class ContactUsController extends Controller
{
	//
	public function contactUS() {
		return view('index');
	}

	public function contactUsPost(Request $request) {
		$this->validate($request, [
			'name' => 'required',
			'email' => 'required|email',
			'message' => 'required'
		]);

		ContactUS::create($request->all());

		Mail::send('email',
			array(
				'name' => $request->get('name'),
				'email' => $request->get('email'),
				'user_message' => $request->get('message')
			), function($message) {
				$message->from('erikshoy@gmail.com');
				$message->to('erikshoy@gmail.com', 'Erik')->subject('Contact Form Feedback');
		});

		return back()->with('success', 'Thank you for contacting us!');
	}
}

<?php

namespace App\Http\Controllers\Page;


use App\Http\Controllers\Controller;
use Mail;

class PageController extends Controller
{
    public function index()
    {
        return $this->home();
    }

    public function home()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }



    public function test()
    {
        $to_name = 'BRZ';
        $to_email = 'dyonisos.mpliamplias@gmail.com';
        $data = array('name'=>"Sam Jose", "body" => "Test mail");

        Mail::send('emails.test', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Artisans Web Testing Mail');
            $message->from('dinner4winner@gmail.com','Artisans Web');
        });
    }

}

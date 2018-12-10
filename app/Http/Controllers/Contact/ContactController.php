<?php
namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Mail;
//use Mail;

class ContactController extends Controller
{
    public function submitForm(Form $form){
            return("hello");
    }

/*
    public function contactUSPost(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
            'subject' => 'required'
        ]);

        ContactUS::create($request->all());

        return back()->with('success', 'Thanks for contacting us!');
    }
*/

    public function send(Request $request)
    {

      $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'message' => 'required',
          'subject' => 'required'
      ]);


      //ContactUS::create($request->all());

        $to_name =  $request->input('name');
        $to_email = $request->input('email');
        $messageText = $request->input('message');
        $data = array('name'=>$to_name, "body" => $messageText);

        Mail::send('emails.contact', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Bestätigung Kontakt Dinner für Gewinner');
            $message->from('dinner4winner@gmail.com','Nico (von Dinner für Gewinner)');
        });

        return back()->with('success', 'Danke für Ihre Kontaktanfrage!');
    }



}

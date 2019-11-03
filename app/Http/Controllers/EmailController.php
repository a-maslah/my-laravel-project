<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pasport;
use App\Email;
use Mail;
use App\Mail\pass_recived;


class EmailController extends Controller
{
   public function send_email($id)
   {
    $message=Pasport::find($id);
            Mail::to($message->email)->send(new pass_recived);
            $email=new Email();
            foreach ($email as $search) {
                if ($search->email==$message->email) {
                    echo 'deja envoyé';
                }
                else {
                    $email->email=$message->email;
                    $email->save();
                    session()->flash('message1','email envoyé avec succés');
                
                }
            }
           
            return redirect('pasports');
            
        
   }
   public function send_email_to_all()
   {
    $emails=Pasport::all('email');

        Mail::to($emails)->send(new pass_recived);
        session()->flash('message2','email envoyé avec succés');
        $email=new Email();
        foreach ($emails as $store) {
            $email->email= $store->email;
           
            }
          
        $email->save();
    return redirect('pasports');
   }
}

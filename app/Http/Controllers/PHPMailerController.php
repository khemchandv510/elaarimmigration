<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;  
use PHPMailer\PHPMailer\Exception;
use App\Models\EmailTemplate;
use App\Models\Smtpconfig;
use PHPMailer\PHPMailer\SMTP;
use App\Models\EmailGroup;
use App\Models\Email;


class PHPMailerController extends Controller
{

    public function email() {
        $emailTemplate = EmailTemplate::get();
        return view("email", compact('emailTemplate'));
    }

    
    public function composeEmail(Request $request) {

        $smtpconfig = Smtpconfig::where('status', 1)->first();

        $emailTemplate = EmailTemplate::where('id', $request->template_id)->first();;
        require base_path("vendor/autoload.php");

        
        try {
            
           $mail = new PHPMailer(true);
           $name = '<strong> Dear '.$request->senderName.' </strong> ';
           $unsubscribe  = '<p>If you are not interested just click <a href="https://system.techfrnd.com/unsubscribe?email='.$request->email.'"> here </a> to unsubscribe plz forword this msg to friends and family and business owners    </p>';
           $mailTemplate =$name . $emailTemplate->content;


            // $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = $smtpconfig->host;
            $mail->SMTPAuth = $smtpconfig->SMTPAuth;
            $mail->Username = $smtpconfig->Username;
            $mail->Password = $smtpconfig->Password;
            $mail->SMTPSecure = $smtpconfig->SMTPSecure;
            $mail->Port = $smtpconfig->Port;
            $mail->setFrom($smtpconfig->setFrom, $smtpconfig->setFromName);
            $mail->addAddress($request->email);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);
 
            $mail->addReplyTo($smtpconfig->replyto, $request->senderName);

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isHTML(true);
 
            $mail->Subject = $emailTemplate->subject;
            $mail->Body    = $mailTemplate;
 
            // $mail->AltBody = plain text version of email body;
 
            $mail->send();
           
            return back()->with("success", "Email has been sent.");
           
 
        } catch (Exception $e) {
            // dd($e->getMessage());
            return back()->with("failed", $e->getMessage());
        }
    }
    
    
    public function showEmailFrom(){
        
        $emailTemplate = EmailTemplate::get();
        $group = EmailGroup::get();
        return view("email-send", compact('emailTemplate', 'group'));
        
    }
    
    public function sendLiveEmail(Request $request){
     
        $template = $request->template_id;
        $group = $request->groupid;
        $limit = $request->emailLimit;
        
        $emails  = Email::select('id', 'name', 'email')->where(['group_id' =>$group, 'unsubscribe' => null, 'status' => 0 ])->orderby('id', 'desc')->limit($limit)->get();
        
       $smtpconfig = Smtpconfig::where('status', 1)->first();
       $emailTemplate = EmailTemplate::where('id', $template)->first();;

        
         require base_path("vendor/autoload.php");
       
        
        foreach($emails as $emaildata){
            
            try{
            
            $mail = new PHPMailer(true);
            $name = '<strong><p> Dear '.$emaildata->name.'</p> </strong> ';
            $unsubscribe  = '<p>If you are not interested just click <a href="https://system.techfrnd.com/unsubscribe?email='.$request->email.'"> here </a> to unsubscribe plz forword this msg to friends and family and business owners    </p>';
           $mailTemplate =$name . $emailTemplate->content;

            $mail->isSMTP();
            $mail->Host = $smtpconfig->host;
            $mail->SMTPAuth = $smtpconfig->SMTPAuth;
            $mail->Username = $smtpconfig->Username;
            $mail->Password = $smtpconfig->Password;
            $mail->SMTPSecure = $smtpconfig->SMTPSecure;
            $mail->Port = $smtpconfig->Port;
            $mail->setFrom($smtpconfig->setFrom, $smtpconfig->setFromName);
            $mail->addAddress($emaildata->email);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);
 
            $mail->addReplyTo($smtpconfig->replyto, $request->senderName);

            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isHTML(true);
 
            $mail->Subject = $emailTemplate->subject;
            $mail->Body    = $mailTemplate;
 
            $mail->send();
           
           
            }catch (Exception $e) {
            dd($e->getMessage());
            //  $emails  = Email::where(['id' =>$emaildata->id ])->update(['status'=> 1, 'send_date' => date('Y-m-d') ] );
            }
           
             $emails  = Email::where(['id' =>$emaildata->id ])->update(['status'=> 1, 'send_date' => date('Y-m-d') ] );
        }
            return back()->with("success", "Email has been sent.");
        
    }
}

<?php


namespace App\Services;


use Illuminate\Support\Facades\Mail;
use App\Models\EmailSetting;
use function Symfony\Component\String\b;

class SendMailService
{
    public static function sendEmailToAdmin($data)
    {
//        dd($data);
        $data['clientMessage'] = $data['message_text'];
        unset($data['message_text']);

        Mail::send('toAdminFromClientPopup', $data, function($message){

            $message->to(env('MAIL_FROM_ADDRESS'))->subject(env('MAIL_FROM_NAME').': New mail from the clients popup!');

            $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));

        });
    }
}

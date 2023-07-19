<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsPopupPostRequest;
use App\Models\ClientsPopupModel;
use App\Services\SendMailService;
use Illuminate\Http\Request;

class ClientsPopupController extends Controller
{
    public function clients_popup()
    {
        $data=ClientsPopupModel::query()->firstOrFail();
        $data = $this->translateModelWithoutIdAndTime($data);

        return response()->json([
            'status'=>'success',
            'data'=>$data
        ]);
    }

   public function clients_popup_post(ClientsPopupPostRequest $request){
        $postData = $request->post();

//        dd($postData);
       $data = new ClientsPopupModel;
       $data->name = $request->name;
       $data->phone = $request->phone;
       $data->email = $request->email;
       $data->city = $request->city;
       $data->message = $request->message_text;
       $data->save();

        SendMailService::sendEmailToAdmin($postData);

        return response()->json([
            'status' => 'success',
            'massage' => 'Send success!'
        ]);
    }
}

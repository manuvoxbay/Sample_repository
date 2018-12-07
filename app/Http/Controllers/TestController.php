<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Edujugon\PushNotification\PushNotification;

class TestController extends Controller
{




    public function sendMessage()
    { 
        try
        {
            $push = new PushNotification('fcm');
            $result = $push->setMessage([
                 'notification' => [
                         'title'=>'This is the title',
                         'body'=>'This is the message',
                         'sound' => 'default'
                         ],
                 'data' => [
                         'extraPayLoad1' => 'value1',
                         'extraPayLoad2' => 'value2'
                         ]
                 ]);
            $push->setApiKey('AAAASOnIjk0:APA91bHa7jhnSKfV_LQ0bTuLGDX5mtNR2rwvrkSb89WXt7pmfuaqkbloWUUtj4rdXZ5c03YPkomoS6_0b4cqkroqUwc1duPGrDXuRqZ6B7iBfZf-EBF0cusN3hbG07oLwkalRHmmxKoS');
            $push->setDevicesToken('eRF93evCdT8:APA91bFUZ26bEL0SpA42RAKtuMbnjERUgDbTZgBN9GN7QRbCksxHYdwkaMMx4MFDHalgGuOJRVHvER2joDtvyZ_H8My8QeefVMjvJlslWeTjuYNxN6lDRP4FPD7Q9XFYNQPkHS1255pr')
            ->send();
            //return$result;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        dd($result);

    }







    public function sendMessage_delete()
    {
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
           $token='diWhHpEdy1k:APA91bHfaE_zy4FUJ_GGDmO3XuJNz5qshyMeyjbIvvdLKI-DkR5rzhS00k9Hwc49yKzJLUraUPbu9-H-XOv8hbT-q-omtzXa8-uAv8Ewej52zO1gH0maKoGP4FLCu9FwVlLSpwBDC_3T';
           

           $notification = [
               'body' => 'this is test',
               'sound' => true,
           ];
           
           $extraNotificationData = ["message" => $notification,"moredata" =>'dd'];

           $fcmNotification = [
               //'registration_ids' => $tokenList, //multple token array
               'to'        => $token, //single token
               'notification' => $notification,
               'data' => $extraNotificationData
           ];

           $headers = [
               'Authorization: key=AAAANU_6io4:APA91bHPsTBFSQLs-F4GN9of6M-iCz0_F86ScwC42FSEBFaqrnMpTfqUnJUHKQD-3EbrU8e3zfh3yiPeXEuP4CjurPKcx7ZcohIht50cSlvXDH8so171hAy0DyD8WbNusTNbKsdFdXZt',
               'Content-Type: application/json'
           ];


           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL,$fcmUrl);
           curl_setopt($ch, CURLOPT_POST, true);
           curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
           curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
           curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
           $result = curl_exec($ch);
           curl_close($ch);


           dd($result);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Twilio\Rest\Client;


class SellerOtp extends Model
{
    use HasFactory;

    public $table = 'sotp';
    public $primarykey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        's_id',
        'otp',
        'otp_expires_at'
    ];

    public function sendSMS($receiverNumber)
    {
        $message = 'Login OTP is '.$this->otp;

        try {
            
            $account_id = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_FROM");

            $client = new Client($account_id, $auth_token);

            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message
            ]);

            echo "SMS sent successfully...";

        } catch (\Exception $e) {
            echo "Error yehe";
        }
    }
}

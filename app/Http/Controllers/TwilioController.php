<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;

class TwilioController extends Controller
{

    protected $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client(config('services.twilio')['account_sid'], config('services.twilio')['auth_token']);;
    }

    public function sendSms()
    {
        try
        {
            // Use the client to do fun stuff like send text messages!
            $this->client->messages->create(
                // the number you'd like to send the message to, also reference: https://www.twilio.com/console/voice/calls/geo-permissions/low-risk
                '886925909047',
                [
                 // A Twilio phone number you purchased at twilio.com/console
                 'from' => '18333982307',
                 // the body of the text message you'd like to send
                 'body' => __('Enormous Lebanon bologna sandwich unveiled at Pennsylvania community fair')
                ]
            );
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    public function makeCall()
    {
        try
        {
            $this->client->calls->create(
                '886925909047', // Call this number, also reference: https://www.twilio.com/console/voice/calls/geo-permissions/low-risk
                '18333982307', // From a valid Twilio number
                [
                    'url' => 'https://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient'
                ]
            );
        }
        catch (Exception $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}

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
        $this->client = new Client(config('app.twilio')['account_sid'], config('app.twilio')['auth_token']);;
    }

    public function sendSms()
    {
        try
        {
            // Use the client to do fun stuff like send text messages!
            $this->client->messages->create(
                // the number you'd like to send the message to, also reference: https://www.twilio.com/console/voice/calls/geo-permissions/low-risk
                '886935120080',
                [
                 // A Twilio phone number you purchased at twilio.com/console
                 'from' => '12057821228',
                 // the body of the text message you'd like to send
                 'body' => '雙十國慶將至，國軍今天清晨出動UH-60M及CH-47直升機、F-16戰機、AT-3教練機等機型，通過台北上空進行半兵力預演，29日則進行全兵力預演；國防部也說，網傳中共打過來是假訊息，請大家放心。'
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
                '886935120080', // Call this number, also reference: https://www.twilio.com/console/voice/calls/geo-permissions/low-risk
                '12057821228', // From a valid Twilio number
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

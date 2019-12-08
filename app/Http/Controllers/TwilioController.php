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
                // the number you'd like to send the message to
                '886935120080',
                [
                 // A Twilio phone number you purchased at twilio.com/console
                 'from' => '12564748863',
                 // the body of the text message you'd like to send
                 'body' => '日前被美國職棒馬林魚球隊釋出的旅美投手陳偉殷，今天中午在基隆市立棒球場受訪時指出，他自己未來動向，還是會以擔任先發投手為目標，但不管是中繼或是先發他都能勝任，陳偉殷預計2020年1月初，返回美國做自主訓練。'
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
                '886935120080', // Call this number
                '12564748863', // From a valid Twilio number
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

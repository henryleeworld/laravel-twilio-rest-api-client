<?php

namespace App\Http\Integrations\Twilio;

use Twilio\Rest\Client;

final readonly class TwilioConnector
{

    protected Client $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client(config('services.twilio')['account_sid'], config('services.twilio')['auth_token']);
    }

    public function message(string $text)
    {
        return $this->client->messages->create(
            // the number you'd like to send the message to, also reference: https://www.twilio.com/console/voice/calls/geo-permissions/low-risk
            '886925909047',
            [
                // A Twilio phone number you purchased at twilio.com/console
                'from' => config('services.twilio.phone_number'),
                // the body of the text message you'd like to send
                'body' => $text
            ]
        );
    }

    public function call()
    {
        return $this->client->calls->create(
            '886925909047', // Call this number, also reference: https://www.twilio.com/console/voice/calls/geo-permissions/low-risk
            config('services.twilio.phone_number'), // From a valid Twilio number
            [
                'url' => 'https://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient'
            ]
        );
    }
}

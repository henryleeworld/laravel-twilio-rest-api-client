<?php

namespace App\Http\Controllers;

use App\Http\Integrations\Twilio\TwilioConnector;

class TwilioController extends Controller
{

    private $twilioConnector;

    /**
     * Instantiate a new TwilioController instance.
     *
     * @param TwilioConnector $twilioConnector
     *
     * @return Response
     */
    public function __construct(TwilioConnector $twilioConnector)
    {
        $this->twilioConnector = $twilioConnector;
    }

    public function sendSms()
    {
        try
        {
            $this->twilioConnector->message(__('Dolphins \'deliberately get high\' on puffer fish nerve toxins by carefully chewing and passing them around'));
        }
        catch (Exception $e)
        {
            echo __('Error: ') . $e->getMessage();
        }
        echo __('The message was sent successfully.');
    }

    public function makeCall()
    {
        try
        {
            $this->twilioConnector->call();
        }
        catch (Exception $e)
        {
            echo __('Error: ') . $e->getMessage();
        }
        echo __('The call was made successfully.');
    }
}

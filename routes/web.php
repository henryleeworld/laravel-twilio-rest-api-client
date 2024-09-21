<?php

use App\Http\Controllers\TwilioController;
use Illuminate\Support\Facades\Route;

Route::get('/twilio/send-sms', [TwilioController::class, 'sendSms']);
Route::get('/twilio/make-call', [TwilioController::class, 'makeCall']);

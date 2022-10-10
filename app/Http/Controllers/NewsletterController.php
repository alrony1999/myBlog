<?php

namespace App\Http\Controllers;

use Exception;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        try {
            $newsletter->subscribe(request('email'));
        } catch(Exception $e) {
            ValidationException::withMessages(([

                'email'=>'This email could not be added to our newsletter list.'

            ]));
        }
    }
}

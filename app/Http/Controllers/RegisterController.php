<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }
    public function store()
    {
        $fields=request()->validate([
            'name'=>'required|min:5',
            'username'=>'required|min:5|max:255|unique:users,username',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8|max:255'
        ]);
        try {
            $mailchimp = new ApiClient();

            $mailchimp->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us8'
            ]);


            $response = $mailchimp->lists->addListMember('dc9a2fa453', [
                'email_address'=>$fields['email'],
                'status'=>'subscribed'
            ]);
        } catch(Exception $e) {
            throw new Exception("Use Another email address");
        }
        User::create($fields);

        return redirect('/login')->with('success', 'Account successfully registered.');
    }
}

<?php

namespace App\Http\Controllers;
use http\Exception;
use App\Services\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\AppServiceProvider;

class NewsletterController extends Controller
{


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            $newsletter->subscribe(request('email'));
        } catch (Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter'
            ]);

        }

        return redirect('/')
            ->with('success', 'You are now signed up for our newsletter!');
    }
}

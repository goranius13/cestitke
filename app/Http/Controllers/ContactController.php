<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    /**
     * Send contact message to info.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function contact(Request $request) {
        try {
            Mail::to('info@cestitke.online')->send(new Contact($request->data));            
            return response()->json(array('success' => true), 200);
        } catch (\Exception $e) {
            echo 'Error - '.$e;         
            return response()->json(array('success' => false), 200);
        }
    }
}

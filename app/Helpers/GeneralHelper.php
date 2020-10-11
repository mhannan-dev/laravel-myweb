<?php
namespace App\Helpers;
use App\Models\Contact;

class GeneralHelper{
    public  static  function message_data(){
        $message_data = Contact::orderBy('id', 'desc')->get();
        return $message_data;
    }

}

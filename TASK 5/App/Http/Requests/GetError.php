<?php
namespace App\Http\Requests;
class GetError{
    public static function messege(string $messege) :string
    {
        return str_replace("-"," ",$messege);
    }

}
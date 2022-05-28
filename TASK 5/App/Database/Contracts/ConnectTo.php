<?php
namespace App\Database\Contracts;

interface ConnectTo
{
    public function __construct();
    public function __destruct();
}
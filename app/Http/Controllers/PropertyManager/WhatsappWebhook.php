<?php

namespace App\Http\Controllers\PropertyManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WhatsappWebhook extends Controller
{
    public function index()
    {
        return view('property.whatsappwebhook.index');
    }
}

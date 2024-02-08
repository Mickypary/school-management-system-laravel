<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function GlobalSettingsView()
    {
        return view('backend.settings.universal');
    }




} // End Class

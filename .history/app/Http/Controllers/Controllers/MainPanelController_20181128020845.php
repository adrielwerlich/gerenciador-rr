<?php

namespace App\Http\Controllers\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainPanelController extends Controller
{
    

    public function servicesPanelEntryPoint () {
        return view('servicesPanel.panel');
    }
}

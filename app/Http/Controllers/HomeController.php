<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Porta;
use App\Upgrade;
use App\Fija;
use App\fijaDigital;
use App\PortaDigital;
use App\Prepost;
use App\prepostDigital;
use App\upgradeDigital;
use App\lineaNueva;
use App\phoenix;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}

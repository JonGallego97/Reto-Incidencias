<?php

namespace App\Http\Controllers;

use App\Models\Incidence;

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
        $userIncidences = Incidence::where('owner_id', auth()->id())
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('incidences.index', ['incidences' => $userIncidences]);
    }

}

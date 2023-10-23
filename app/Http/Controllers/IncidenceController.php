<?php

namespace App\Http\Controllers;

use App\Models\Incidence;
use Illuminate\Http\Request;

class IncidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidences = Incidence::orderBy('created_at')->get();
        return view('incidences.index',['incidences' => $incidences]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('incidences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incidence = new Incidence();
        $incidence->title = $request->title;
        $incidence->text = $request->text;
        $incidence->estimated_minutes = $request->estimated_minutes;
        $incidence->category_id = $request->category_id;
        $incidence->department_id = $request->department_id;
        $incidence->owner_id = auth()->user()->id;


        $incidence->save();

        return redirect()->route('incidences.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Incidence $incidence)
    {
        return view('incidences.show', ['incidence' => $incidence]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incidence $incidence)
    {
        return view('incidences.edit', ['incidence' => $incidence]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Incidence $incidence)
{
    $incidence->title = $request->title;
    $incidence->text = $request->text;
    $incidence->estimated_minutes = $request->estimated_minutes;
    $incidence->category_id = $request->category_id;
    $incidence->department_id = $request->department_id;
    $incidence->owner_id = auth()->user()->id;

    $incidence->save();

    return view('incidences.show', ['incidence' => $incidence]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Incidence $incidence)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use App\Models\Department;
use App\Models\Incidence;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::all();
        $departmentsWithIncidences = [];

        foreach ($departments as $department) {
            $incidences = Incidence::where('department_id', $department->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            $departmentsWithIncidences[] = [
                'department' => $department,
                'incidences' => $incidences,
            ];
        }

        return view('departments.index', ['departmentsWithIncidences' => $departmentsWithIncidences]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departments.form');

    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('departments', 'name'),
            ],
        ]);

        $department = new Department();
        $department->name = $request->input('name');
        $department->save();

        return redirect()->route('departments.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('departments.show', ['department' => $department]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        return view('departments.form', ['department' => $department]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('departments', 'name'),
            ],
        ]);
        $department->name = $request->name;
        $department ->save();
        return view('departments.show', ['department' => $department]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        try {

            $department->delete();

            return redirect()->route('departments.index');
        } catch (\Exception $e) {
            return redirect()->route('departments.index')->with('error', 'No se puede eliminar el departamento debido a incidencias o usuarios asociados a él.');
        }

    }
}

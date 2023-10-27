<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Incidence;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $categoriesWithIncidences = [];

        foreach ($categories as $category) {
            $incidences = Incidence::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            $categoriesWithIncidences[] = [
                'category' => $category,
                'incidences' => $incidences,
            ];
        }

        return view('categories.index', ['categoriesWithIncidences' => $categoriesWithIncidences]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.form');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('categories', 'name'),
            ],
        ]);
        $categories = new Category();
        $categories ->name = $request ->name;
        $categories->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('categories.show', ['category' => $category]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.form', ['category' => $category]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => [
                'required',
                Rule::unique('categories', 'name'),
            ],
        ]);
        $category->name = $request->name;
        $category ->save();
        return view('categories.show', ['category' => $category]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
{
    // Obtén todas las incidencias que tienen esta categoría
    $incidences = Incidence::where('category_id', $category->id)->get();

    // Desasocia las incidencias eliminando su referencia a la categoría
    foreach ($incidences as $incidence) {
        $incidence->category_id = null;
        $incidence->save();
    }

    // Luego, elimina la categoría
    $category->delete();

    return redirect()->route('categories.index');
}
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

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
            $incidences = $category->incidences()
                ->orderBy('created_at', 'desc')
                ->take(5)
                ->get();

            $categoriesWithIncidences[] = [
                'category' => $category,
                'incidences' => $incidences,
            ];
        }

        return $categoriesWithIncidences;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpParser\Builder\Trait_;
use App\Models\Category;
use App\Models\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $categorie)
    {
        // Get all categories for in the table
        $categories_all = $categorie->where('user_id', Auth::user()->id)->get();

        // Count how many categories there are
        $categories_count = $categorie->where('user_id', Auth::user()->id)->count('*');

        return view('categorie', ['categories_all' => $categories_all, 'categories_count' => $categories_count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // If user already has 5 categories, return back else store new category
        if (Auth::user()->categories->count() >= 5) {
            return redirect()->back();
        } 
        // if $name is empty or with a invisible character, return back with error
        if ($request->get('name') == null || $request->get('name') == '' || $request->get('name') == ' ' || $request->get('name') == 'ㅤ') {
            return redirect()->back()->with('error', 'Je moet een naam opgeven');
        }
        // get name of category
        $name = $request->get('name');
        // if $name is above 15 characters, return back with error
        if (strlen($name) > 15) {
            return back()->with('error', 'De titel is te lang');
        }
        // get color of category, at the moment is color not being used
        $color = $request->get('color');
        // if everything is filled, save all as variables, save it and redirect back
        $categorie = new Category();
        $categorie->name = $name;
        $categorie->color = 0; // $color;
        $categorie->user_id = Auth::id();
        $categorie->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $expense
     * @return \Illuminate\Http\Category
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $expense
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categorie)
    {
        if ($categorie->transactions->count() > 0) {
            return redirect()->back()->with('error', 'Categorie "'.$categorie->name.'" heeft nog '.$categorie->transactions->count().' transactie(s) gekoppeld');
        } else {
            $categorie->delete();
            return redirect()->back();
        }
    }

}

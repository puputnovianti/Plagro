<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {

        return view('categories.index', [
            'categories' => Category::orderBy('id')->get()
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        Category::create([
            'list' => $request->list,
        ]);
        return redirect('categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        Category::find($id)->update(['list' => $request->list]);
        return redirect('categories');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }
}

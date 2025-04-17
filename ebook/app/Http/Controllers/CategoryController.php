<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;



class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories  = Category::all();
        return view('admin.showcat',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.createcat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storecat(Request $request)
    {
        $categories= new Category();
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('showcat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::find($id);
        return view('admin.editcat',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save();
        return redirect()->route('showcat');
        $categories->update();
        return redirect()->route('showcat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->route('showcat');
    }
    public function active($id)
    {
        $categories = Category::find($id);
        $categories->status = 1;
        $categories->update();
        return redirect()->route('showcat');
    }
    public function deactive($id)
    {
        $categories = Category::find($id);
        $categories->status = 0;
        $categories->update();
        return redirect()->route('showcat');
    }
}

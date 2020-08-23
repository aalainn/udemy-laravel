<?php

namespace App\Http\Controllers;

use App\categories;
use App\projects;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::all();
        return view('categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation: If not successfull then the form will be reloaded and an error-object comes back
        $request->validate(
            [
                'category_name' => 'required|min:3', // field is required and at least 3 chars long
                'category_style' => 'required|min:4'
            ]
        );

        $category = new categories(
            [
                'category_name' => $request->category_name,
                'category_style' => $request->category_style
            ]
        );

        $category->save();

        return redirect('/categories')->with(
            'msg_success' , '<span style="font-weight: bold; text-transform: capitalize;">' . $category['category_name'] . '</span> added'
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $category)
    {
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, categories $category)
    {
        // Validation: If not successfull then the form will be reloaded and an error-object comes back
        $request->validate(
            [
                'category_name' => 'required|min:3', // field is required and at least 3 chars long
                'category_style' => 'required|min:4'
            ]
        );

        $category->update(
            [
                'category_name' => $request->category_name,
                'category_style' => $request->category_style
            ]
        );

        return redirect('/categories')->with(
            'msg_success' , '<span style="font-weight: bold; text-transform: capitalize;">' . $category['category_name'] . '</span> edited'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category)
    {
        $deleted_category = $category->category_name;
        $category->delete();
        return redirect('/categories')->with(
            'msg_success' , '<i class="fa fa-check-circle"></i><span class="pl-2" style="font-weight: bold; text-transform: capitalize;">' . $deleted_category . '</span> deleted'
        );
    }
}

<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\BuildingIncomeCategory;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = BuildingIncomeCategory::get();
        return view('property.income.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('property.income.category.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new BuildingIncomeCategory();
        $category->name = $request->name;
        $category->save();
        if ($category) {
            //NotificationHelper::web_panel_notification('property_create', 'property_id', $building->id);
            return redirect()->route('property.income_category.index')->with($this->message('Category Create SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Category Create Error", 'error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $category = BuildingIncomeCategory::findOrFail($id);
        return view('property.income.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = BuildingIncomeCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        if ($category) {
            return redirect()->route('property.income_category.index')->with($this->message('Category update SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Category update Error", 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $category = BuildingIncomeCategory::findOrFail($id);
        $category->delete();
        if ($category) {
            return response()->json(['status'=>'success','message'=>'Category Delete SuccessFully']);
        } else {
            return response()->json(['status'=>'error','message'=>'Category Delete Error']);
        }
    }
}

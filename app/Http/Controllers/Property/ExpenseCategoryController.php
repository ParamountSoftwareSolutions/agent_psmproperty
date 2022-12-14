<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\BuildingCategory;
use App\Models\BuildingExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $category = BuildingExpenseCategory::get();
        return view('property.office_expense.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('property.office_expense.category.index');
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
        $category = new BuildingExpenseCategory();
        $category->name = $request->name;
        $category->save();
        if ($category) {
            //NotificationHelper::web_panel_notification('property_create', 'property_id', $building->id);
            return redirect()->route('property.office_expense_category.index')->with($this->message('Category Create SuccessFully', 'success'));
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
        $category = BuildingExpenseCategory::findOrFail($id);
        return view('property.office_expense.category.edit', compact('category'));
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
        $category = BuildingExpenseCategory::findOrFail($id);
        $category->name = $request->name;
        $category->save();
        if ($category) {
            return redirect()->route('property.office_expense_category.index')->with($this->message('Category update SuccessFully', 'success'));
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
        $category = BuildingExpenseCategory::findOrFail($id);
        $category->delete();
        if ($category) {
            return response()->json(['status'=>'success','message'=>'Category Delete SuccessFully']);
        } else {
            return response()->json(['status'=>'error','message'=>'Category Delete Error']);
        }
    }
}

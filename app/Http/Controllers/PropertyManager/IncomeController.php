<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\BuildingExpense;
use App\Models\BuildingIncomeCategory;
use App\Models\IncomeCategory;
use Carbon\Carbon;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $income = Income::with('category')->get();
        return view('property.income.index', compact('income'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = BuildingIncomeCategory::all();
        return view('property.income.create',compact('categories'));
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
            'category_id' => 'required',
            'cost' => 'required',
        ]);
        $income = new Income();
        $income->category_id = $request->category_id;
        $income->cost = $request->cost;
        $income->date = $request->date;
        $income->save();
        if($income){
            return redirect()->route('property.income.index',Helpers::user_login_route()['panel'])->with($this->message('Income Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Income Create Error','error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($panel,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($panel,$id)
    {
        $income = Income::findOrFail($id);
        $categories = BuildingIncomeCategory::all();
        return view('property.income.edit', compact('income','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$panel, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'cost' => 'required',
        ]);
        $income = Income::findOrFail($id);
        $income->category_id = $request->category_id;
        $income->cost = $request->cost;
        $income->date = $request->date;
        $income->save();
        if($income){
            return redirect()->route('property.income.index',Helpers::user_login_route()['panel'])->with($this->message('Income Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Income Update Error','error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($panel,$id)
    {
        $income = Income::findOrFail($id);
        $income->delete();
        if($income){
            return response()->json(['status' => 'success', 'message' => 'Income Delete Successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Income Delete Error']);
        }
    }

    public function incomeSummary(Request $request,$panel)
    {
        if(isset($request->start_month)){
            $year = Carbon::parse($request->start_month)->format('Y');
        }else{
            $year = date('Y');
        }
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];
        $incomes = [];
        $categories = BuildingIncomeCategory::pluck('name','id')->toArray();
        foreach($categories as $id => $name){
            for($i = 1;$i<= 12;$i++) {
                $income = Income::where('category_id', $id)->whereMonth('date', $i)->whereYear('date',$year);
                if (isset($request->start_month) && isset($request->last_month)){
                    $income->whereBetween('date',[$request->start_month,$request->last_month]);
                }
                $income = $income->sum('cost');
                $incomes[$name][] = $income;
            }
        }
        $total = [];
        for($i = 1;$i<= 12;$i++) {
            $income = Income::whereMonth('date', $i)->whereYear('date',$year);
            if (isset($request->start_month) && isset($request->last_month)){
                $income->whereBetween('date',[$request->start_month,$request->last_month]);
            }
            $total[] = $income->sum('cost');
        }
        return view('property.income.report', compact('incomes','months','total'));
    }
}

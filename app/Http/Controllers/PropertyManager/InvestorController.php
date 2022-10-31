<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Investor;
use App\Models\InvestorHistory;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investor = Investor::all();
        return view('property.investor.index', compact('investor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('property.investor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'phone_number' => 'required|unique:users,phone_number',
            'cnic' => 'required|unique:users,cnic',
            'total_amount' => 'required',
            'invested_amount' => 'required',
            'invested_in' => 'required',
            'remaining_amount' => 'required',
        ]);
        $user = new User();
        $user->username = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->cnic = $request->cnic;
        $user->address = $request->address;
        $user->save();

        $investor = new Investor();
        $investor->user_id = $user->id;
        $investor->invest_to = Auth::user()->id;
        $investor->total_amount = $request->total_amount;
        $investor->profit = $request->profit;
        $investor->loss = $request->loss;
        $investor->investor_profit_amount = $request->investor_profit_amount;
        $investor->remaining_amount = $request->remaining_amount;
        $investor->save();

        $investor_history = new InvestorHistory();
        $investor_history->investor_id = $investor->id;
        $investor_history->invested_amount = $request->invested_amount;
        $investor_history->invested_in = $request->invested_in;
        $investor_history->save();

        if($investor){
            return redirect()->route('property.investor.index',Helpers::user_login_route()['panel'])->with($this->message('Investor Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Investor Create Error','error'));
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
        $investor = Investor::findOrFail($id);
        $investor_history = InvestorHistory::where('investor_id',$id)->get();
        return view('property.investor.show', compact('investor_history'));

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
        return view('property.income.edit', compact('income'));
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
            'category' => 'required',
            'cost' => 'required',
        ]);
        $income = Income::findOrFail($id);
        $income->category = $request->category;
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
        $categories  = ['rent','personal_property_rent','group_a','group_b','file_income','property_income','others'];
        $incomes = [];
        foreach($categories as $category){
            for($i = 1;$i<= 12;$i++) {
                $income = Income::where('category', $category)->whereMonth('date', $i)->whereYear('date',$year);
                if (isset($request->start_month) && isset($request->last_month)){
                    $income->whereBetween('date',[$request->start_month,$request->last_month]);
                }
                $income = $income->sum('cost');
                $incomes[$category][] = $income;
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

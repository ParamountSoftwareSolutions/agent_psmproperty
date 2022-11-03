<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\BuildingCategory;
use App\Models\BuildingSize;
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
        $investor = Investor::where('invest_to',Auth::user()->id)->get();
        return view('property.investor.index', compact('investor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $buildings = Helpers::building_detail();
        $categories = BuildingCategory::all();
        $sizes = BuildingSize::all();
        return view('property.investor.create',compact('buildings','categories','sizes'));
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
            'phone_number' => 'required|unique:users,phone_number',
            'email' => 'unique:users,email',
            'cnic' => 'unique:users,cnic',
            'total_amount' => 'required',
            'invested_amount' => 'required',
            'invested_in' => 'required',
        ]);
        if((int)$request->total_amount < (int)$request->invested_amount){
            return redirect()->back()->with($this->message('Invested Amount Cannot Be Greater Than Total Amount','danger'));
        }
        $user = new User();
        $user->username = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->cnic = $request->cnic;
        $user->address = $request->address;
        $user->save();

        $remaining_amount = (int)$request->total_amount - (int)$request->invested_amount;

        $investor = new Investor();
        $investor->user_id = $user->id;
        $investor->invest_to = Auth::user()->id;
        $investor->total_amount = $request->total_amount;
        $investor->profit = $request->profit;
        $investor->loss = $request->loss;
        $investor->investor_profit_amount = $request->investor_profit_amount;
        $investor->profit_percentage = $request->profit_percentage;
        $investor->return_amount = $request->return_amount;
        $investor->return_date = $request->return_date;
        $investor->remaining_amount = $remaining_amount;
        $investor->save();

        $investor_history = new InvestorHistory();
        $investor_history->investor_id = $investor->id;
        $investor_history->invested_amount = $request->invested_amount;
        $investor_history->invested_in = $request->invested_in;
        $investor_history->category_id = $request->category_id;
        $investor_history->size_id = $request->size_id;
        $investor_history->quantity = $request->quantity;
        $investor_history->profit_percentage = $request->profit_percentage;
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
        $buildings = Helpers::building_detail();
        $categories = BuildingCategory::all();
        $sizes = BuildingSize::all();
        $investor = Investor::withSum('history','invested_amount')->with('history','user')->findOrFail($id);
        return view('property.investor.show', compact('investor','buildings','categories','sizes'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($panel,$id)
    {
        $investor = Investor::findOrFail($id);
        return view('property.investor.edit', compact('investor'));
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
        $investor = Investor::findOrFail($id);
        $user = User::findOrFail($investor->user_id);
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required|unique:users,phone_number,'.$user->id,
            'email' => 'unique:users,email,'.$user->id,
            'cnic' => 'unique:users,cnic,'.$user->id,
            'total_amount' => 'required',
        ]);
        $user->username = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->cnic = $request->cnic;
        $user->address = $request->address;
        $user->save();

        $remaining_amount = (int)$request->total_amount - (int)$investor->history->sum('invested_amount');
        $investor->total_amount = $request->total_amount;
        $investor->remaining_amount = $remaining_amount;
        $investor->save();
        if($investor){
            return redirect()->route('property.investor.index',Helpers::user_login_route()['panel'])->with($this->message('Investor Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Investor Update Error','error'));
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
        $investor_histories = InvestorHistory::where('investor_id',$id)->delete();
        $investor = Investor::findOrFail($id);
        $investor->delete();
        if($investor){
            return response()->json(['status' => 'success', 'message' => 'Investor Delete Successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Investor Delete Error']);
        }
    }

    public function add_investment(Request $request,$panel,$id)
    {
        $investor = Investor::findOrFail($id);
        $request->validate([
            'invested_amount' => 'required',
            'invested_in' => 'required',
        ]);
        if((int)$investor->total_amount < (int)$request->invested_amount){
            return redirect()->back()->with($this->message('Invested Amount Cannot Be Greater Than Total Amount','danger'));
        }
        $remaining_amount = (int)$investor->remaining_amount - (int)$request->invested_amount;

        $investor_history = new InvestorHistory();
        $investor_history->investor_id = $investor->id;
        $investor_history->invested_amount = $request->invested_amount;
        $investor_history->invested_in = $request->invested_in;
        $investor_history->category_id = $request->category_id;
        $investor_history->size_id = $request->size_id;
        $investor_history->quantity = $request->quantity;
        $investor_history->profit_percentage = $request->profit_percentage;
        $investor_history->save();

        $investor->remaining_amount = $remaining_amount;
        $investor->save();
        if($investor){
            return redirect()->route('property.investor.index',Helpers::user_login_route()['panel'])->with($this->message('Investment Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Investor Create Error','error'));
        }
    }
}

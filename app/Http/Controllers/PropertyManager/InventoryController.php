<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingAssignUser;
use App\Models\BuildingBlock;
use App\Models\BuildingCategory;
use App\Models\BuildingCustomer;
use App\Models\BuildingInventory;
use App\Models\BuildingSale;
use App\Models\BuildingSize;
use App\Models\Country;
use App\Models\Floor;
use App\Models\FloorDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $country = Country::all();
        $client_id = BuildingCustomer::where('property_admin_id', Helpers::user_admin())->get()->pluck('customer_id');
        $client = User::whereIn('id', $client_id)->get();
        $sale_person = Helpers::sales_person();
        $buildings = Helpers::building_detail();
        $inventory = BuildingInventory::whereIn('building_id', $buildings->pluck('id')->toArray())->get();
        return view('property_manager.inventory.index', compact('inventory','client','country','sale_person'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $buildings = Helpers::building_detail();
        $category = BuildingCategory::get();
        $size = BuildingSize::get();
        return view('property_manager.inventory.create', compact('buildings', 'category', 'size'));
    }

    public function building($id)
    {
        $building = Helpers::building_detail_single($id);
        $block = BuildingBlock::where('building_id', $building->id)->get();
        return json_encode($block);
    }

//    public function block($panel, $id, $building_id)
//    {
//        $floor = Floor::where('id', $id)->first();
//        $floor_detail = FloorDetail::where(['floor_id' => $floor->id, 'building_id' => $building_id])->where('status', 'available')->get();
//        return json_decode($floor_detail);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'building_id' => 'required',
            'category_id' => 'required',
            'nature' => 'required',
        ]);
        if ($request->simple_unit_no == null){
            $request->validate([
                'bulk_unit_no' => 'required',
                'start_unit_no' => 'required',
                'end_unit_no' => 'required',
            ], [
                'end_unit_no' => 'Bulck Fields is required'
            ]);
        }

        if ($request->simple_unit_no == null && $request->bulk_unit_no !== null){
            //print_r($request->end_unit_no . " " . $request->start_unit_no . "<br>");
            $length = $request->end_unit_no - $request->start_unit_no;
            //print_r($length . "<br>");
            for ($i = 0; $length >= $i; $i++){
                $unit = $request->bulk_unit_no . $request->start_unit_no++;
                //print_r($unit. "<br>");
                $inventory = new BuildingInventory();
                $inventory->building_id = $request->building_id;
                $inventory->block_id = $request->block_id;
                $inventory->unit_no = $unit;
                $inventory->size_id = $request->size_id;
                $inventory->category_id = $request->category_id;
                $inventory->nature = $request->nature;
                $inventory->type = $request->type;
                $inventory->price = $request->price;
                $inventory->save();
                //print_r($i. " " . $request->bulk_unit_no . $request->start_unit_no++ ."<br>");
            }
            //dd('for loop');
        }else{
            $inventory = new BuildingInventory();
            $inventory->building_id = $request->building_id;
            $inventory->block_id = $request->block_id;
            $inventory->unit_no = $request->simple_unit_no;
            $inventory->size_id = $request->size_id;
            $inventory->category_id = $request->category_id;
            $inventory->nature = $request->nature;
            $inventory->type = $request->type;
            $inventory->purchased_price = $request->purchased_price;
            $inventory->sold_price = $request->sold_price;
            $inventory->down_payment = $request->down_payment;
            $inventory->status = $request->status;
            $inventory->save();
        }
        if ($inventory) {
            //NotificationHelper::web_panel_notification('property_create', 'property_id', $building->id);
            return redirect()->route('property_manager.inventory.index')->with($this->message('Inventory Create SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Inventory Create Error", 'error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $buildings = Helpers::building_detail();
        $inventory = BuildingInventory::whereIn('building_id', $buildings->pluck('id')->toArray())->findOrFail($id);
        $category = BuildingCategory::get();
        $size = BuildingSize::get();
        return view('property_manager.inventory.edit', compact('buildings', 'inventory', 'category', 'size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'building_id' => 'required',
            'unit_no' => 'required',
            'category_id' => 'required',
            'nature' => 'required',
        ]);
        $inventory = BuildingInventory::findOrFail($id);
        $inventory->building_id = $request->building_id;
        $inventory->block_id = $request->block_id;
        $inventory->unit_no = $request->unit_no;
        $inventory->size_id = $request->size_id;
        $inventory->category_id = $request->category_id;
        $inventory->nature = $request->nature;
        $inventory->type = $request->type;
        $inventory->purchased_price = $request->purchased_price;
        $inventory->sold_price = $request->sold_price;
        $inventory->down_payment = $request->down_payment;
        $inventory->status = $request->status;
        $inventory->save();
        if ($inventory) {
            //NotificationHelper::web_panel_notification('property_create', 'property_id', $building->id);
            return redirect()->route('property_manager.inventory.index')->with($this->message('Inventory update successFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Inventory update error", 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $building = Helpers::building_detail();
        $inventory = BuildingInventory::whereIn('building_id', $building->pluck('id')->toArray())->findOrFail($id);
        $inventory->delete();
        if ($inventory) {
            return redirect()->route('property_manager.inventory.index')->with($this->message('Inventory delete SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Building delete Error", 'error'));
        }
    }



    public function filter(Request $request)
    {
        $country = Country::all();
        $client_id = BuildingCustomer::where('property_admin_id', Helpers::user_admin())->get()->pluck('customer_id');
        $client = User::whereIn('id', $client_id)->get();
        $sale_person = Helpers::sales_person();
        $buildings = Helpers::building_detail();
        $inventory = BuildingInventory::whereIn('building_id', $buildings->pluck('id')->toArray());

        if(isset($request->status) && $request->status !== null){
            $inventory->where('status',$request->status);
        }
        $inventory = $inventory->get();
        return view('property_manager.inventory.index', compact('inventory','client','country','sale_person'));
    }
    public function change_status(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => 'required',
            'comment' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
        }

        $floor_detail = FloorDetail::findOrFail($request->id);
        if ($request->status == 'sold' || $request->status == 'hold' || $request->status == 'token') {
            if ($floor_detail->status == 'sold' && ($request->status == 'hold' || $request->status == 'token')) {
                return response()->json(['status' => 'error', 'message' => 'You Have To First Cancelled the Status..']);
            }
            $validator = Validator::make($request->all(), [
                'client_id' => 'required',
                'sale_person_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
            }
            $user = User::findOrFail($request->client_id);
            if (isset($request->father_name)) {
                $user->father_name = $request->father_name;
            }
            if (isset($request->cnic)) {
                $validator = Validator::make($request->all(), [
                    'cnic' => 'required|unique:users,cnic,' . $user->id,
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
                }
                $user->cnic = $request->cnic;
            }
            if (isset($request->email)) {
                $validator = Validator::make($request->all(), [
                    'email' => 'required|unique:users,email,' . $user->id,
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
                }
                $user->email = $request->email;
            }
            if (isset($request->phone_number)) {
                $validator = Validator::make($request->all(), [
                    'phone_number' => 'required|unique:users,phone_number,' . $user->id,
                ]);
                if ($validator->fails()) {
                    return response()->json(['status' => 'error', 'message' => $validator->errors()->first()]);
                }
                $user->phone_number = $request->phone_number;
            }
            if (isset($request->password)) {
                $user->address = Hash::make($request->password);
            }
            if (isset($request->address)) {
                $user->address = $request->address;
            }
            if (isset($request->dob)) {
                $user->dob = $request->dob;
            }
            if (isset($request->country_id)) {
                $user->country_id = $request->country_id;
            }
            $user->save();
            $building_sale = new BuildingSale();
            $building_sale->building_id = $floor_detail->building_id;
            $building_sale->floor_detail_id = $floor_detail->id;
            $building_sale->customer_id = $request->client_id;
            $building_sale->user_id = $request->sale_person_id;
            $building_sale->payment_plan_id = $floor_detail->payment_plan_id;
            if ($request->status == 'sold') {
                $building_sale->order_status = 'active';
                $building_sale->order_type = 'sale';
            } elseif ($request->status == 'hold') {
                $building_sale->order_status = 'mature';
                $building_sale->order_type = 'lead';
            } else {
                $building_sale->order_status = 'token';
                $building_sale->order_type = 'lead';
            }
            $building_sale->save();
        }
        if ($request->status == 'cancelled' && $floor_detail->status == 'available') {
            return response()->json(['status' => 'error', 'message' => 'Cannot Cancelled when Available']);
        }
        if (!isset($building_sale)) {
            $building_sale = BuildingSale::where('floor_detail_id', $floor_detail->id)->latest('id')->first();
        }
        $data = [
            'status' => $request->status,
            'date' => Carbon::now()->format('Y-m-d'),
        ];
        $building_sale_histories = new BuildingSaleHistory();
        $building_sale_histories->key = 'floor_detail';
        $building_sale_histories->building_sale_id = $building_sale->id;
        $building_sale_histories->data = json_encode($data);
        $building_sale_histories->comment = $request->comment;
        $building_sale_histories->save();

        $floor_detail->status = $request->status;
        $floor_detail->save();
        return response()->json(['status' => 'success', 'message' => 'Status Changed Successfully']);
    }
}

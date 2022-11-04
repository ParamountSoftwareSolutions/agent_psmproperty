<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingAssignUser;
use App\Models\BuildingBlock;
use App\Models\BuildingCustomer;
use App\Models\BuildingInventory;
use App\Models\Floor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $buildings = Helpers::building_detail();
        return view('property.building.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $buildings = Helpers::building_detail();
        return view('property.building.create', compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            //'start_date' => 'required',
        ]);
        $building = Helpers::building_detail()->count();
        if (Auth::user()->building == $building) {
            return redirect()->back()->with($this->message('Building Limit Complete. Please Contact Super Admin', 'warning'));
        } else {
            $building = new Building();
            $building->name = $request->name;
            $building->code = $request->code;
            $building->start_date = $request->start_date;
            $building->save();
            BuildingAssignUser::create([
                'building_id' => $building->id,
                'user_id' => Auth::id(),
            ]);
            if ($building) {
                NotificationHelper::web_panel_notification('property_create', 'property_id', $building->id);
                return redirect()->route('property.building.index',Helpers::user_login_route()['panel'])->with($this->message('Building Create SuccessFully', 'success'));
            } else {
                return redirect()->back()->with($this->message("Building Create Error", 'error'));
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($panel,$id)
    {
        $building = Helpers::building_detail_single($id);
        return view('property.building.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$panel, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);
        $building = Building::findOrFail($id);
        $building->name = $request->name;
        $building->code = $request->code;
        $building->start_date = $request->start_date;
        $building->save();
        if ($building) {
            NotificationHelper::web_panel_notification('property_update', 'property_id', $building->id);
            return redirect()->route('property.building.index',Helpers::user_login_route()['panel'])->with($this->message('Building update SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Building update Error", 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($panel,$id)
    {
        $building = Building::findOrFail($id);
        $assign_data = BuildingAssignUser::where('building_id', $id)->delete();
        $building->delete();
        if ($building) {
            return response()->json(['message'=>'Building delete SuccessFully','status'=> 'success']);
        } else {
            return response()->json(['message'=>'Building delete Error','status'=> 'error']);
        }
    }

    public function detail_form()
    {
        return view('property.building.building_extra_detail');
    }

    public function building_view($panel,$building_id)
    {
        $building = Building::with('block.inventory')->findOrFail($building_id);
        $blocks = BuildingBlock::where('building_id',$building_id)->get();
        $inventories = BuildingInventory::where('building_id',$building_id)->whereNull('block_id')->get();
        return view('property.building.view', compact('building','blocks','inventories'));
    }

    public function generatePDF($panel,$building_id)
    {
        $building = Helpers::building_detail_single($building_id);
        $blocks = BuildingBlock::where('building_id',$building_id)->get();
        $inventories = BuildingInventory::where('building_id',$building_id)->whereNull('block_id')->get();
        $pdf = PDF::loadView('property.building.pdf-inventries', compact('building','blocks','inventories'))->setOptions(['defaultFont' => 'sans-serif','isRemoteEnabled' => true]);
        return $pdf->download($building->name.'.pdf');
    }

    public function buildingInventries($building_id)
    {
//        $building = Building::building_detail_single($building_id);
        $building = Building::findOrFail($building_id);
        $floors = Floor::with('floor_detail')->whereIn('id', json_decode($building->floor_list))->get();
        return view('property.building.show-inventries', compact('building','floors'));

    }
}

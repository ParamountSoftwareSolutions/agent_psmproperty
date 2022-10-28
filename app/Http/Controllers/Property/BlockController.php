<?php

namespace App\Http\Controllers\Property;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingBlock;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $block = BuildingBlock::get();
        return view('property.block.index', compact('block'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $building = Helpers::building_detail();
        return view('property.block.create', compact('building'));
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
        $block = new BuildingBlock();
        $block->building_id = $request->building_id;
        $block->name = $request->name;
        $block->code = $request->code;
        $block->start_date = $request->start_date;
        $block->save();
        if ($block) {
            //NotificationHelper::web_panel_notification('property_create', 'property_id', $building->id);
            return redirect()->route('property.block.index')->with($this->message('Block Create SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Block Create Error", 'error'));
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
        $block = BuildingBlock::findOrFail($id);
        $building = Building::get();
        return view('property.block.edit', compact('block', 'building'));
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
            'building_id' => 'required',
            'name' => 'required',
            'code' => 'required',
        ]);
        $block = BuildingBlock::findOrFail($id);
        $block->building_id = $request->building_id;
        $block->name = $request->name;
        $block->code = $request->code;
        $block->start_date = $request->start_date;
        $block->save();
        if ($block) {
            return redirect()->route('property.block.index')->with($this->message('Building update SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Building update Error", 'error'));
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
        $block = BuildingBlock::findOrFail($id);
        $block->delete();
        if ($block) {
            return redirect()->route('property.block.index')->with($this->message('Block delete SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("Building delete Error", 'error'));
        }
    }
}

<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingFaq;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $faqs = BuildingFaq::get();
<<<<<<< HEAD
        return view('property.faq.index', compact('faqs'));
=======
        $building = Helpers::building_detail();
        return view('property_manager.faq.index', compact('faqs', 'building'));
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
<<<<<<< HEAD
        return view('property.faq.create');
=======
        $building = Helpers::building_detail();
        return view('property_manager.faq.create', compact('building'));
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
//        dd(Helpers::building_assign_user());
        $request->validate([
            'description' => 'required',
        ]);
        $faq = new BuildingFaq();
        $faq->property_admin_id = Helpers::user_admin();
        $faq->description = $request->description;
        $faq->save();
        if($faq){
            return redirect()->route('property.faq.index',Helpers::user_login_route()['panel'])->with($this->message('Faq Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Faq Create Error','error'));
=======
        $request->validate([
            'building_id' => 'required',
            'description' => 'required',
        ]);
        $faq = new BuildingFaq();
        $faq->property_admin_id = Helpers::building_assign_user()->property_admin_id;
        $faq->building_id = json_encode($request->building_id);
        $faq->description = $request->description;
        $faq->save();
        if($faq){
            return redirect()->route('property_manager.faq.index')->with(['success' => 'Faq Create Successfully']);
        } else{
            return redirect()->back()->with(['error' => 'Faq Create Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function show($panel,$id)
=======
    public function show($id)
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
<<<<<<< HEAD
    public function edit($panel,$id)
    {
        $faq = BuildingFaq::findOrFail($id);
        return view('property.faq.edit', compact('faq'));
=======
    public function edit($id)
    {
        $faq = BuildingFaq::findOrFail($id);
        $building = Helpers::building_detail();
        return view('property_manager.faq.edit', compact('building', 'faq'));
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function update(Request $request,$panel, $id)
    {
        $request->validate([
            'description' => 'required',
        ]);
        $faq = BuildingFaq::findOrFail($id);
        $faq->description = $request->description;
        $faq->save();
        if($faq){
            return redirect()->route('property.faq.index',Helpers::user_login_route()['panel'])->with($this->message('Faq Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Faq Update Error','error'));
=======
    public function update(Request $request, $id)
    {
        $request->validate([
            'building_id' => 'required',
            'description' => 'required',
        ]);
        $faq = BuildingFaq::findOrFail($id);
        $faq->property_admin_id = Helpers::building_assign_user()->property_admin_id;
        $faq->building_id = json_encode($request->building_id);
        $faq->description = $request->description;
        $faq->save();
        if($faq){
            return redirect()->route('property_manager.faq.index')->with(['success' => 'Faq Update Successfully']);
        } else{
            return redirect()->back()->with(['error' => 'Faq Update Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function destroy($panel,$id)
=======
    public function destroy($id)
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    {
        $faq = BuildingFaq::findOrFail($id);
        $faq->delete();
        if($faq){
<<<<<<< HEAD
            return response()->json(['status'=>'success','message' => 'Faq Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'Faq Delete Error']);
=======
            return redirect()->route('property_manager.faq.index')->with(['success' => 'Faq Delete Successfully']);
        } else{
            return redirect()->back()->with(['error' => 'Faq Delete Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }
}

<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingPrivacyPolicie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Help;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->get();
<<<<<<< HEAD
        return view('property.privacyPolicy.index', compact('privacyPolicy'));
=======
        return view('property_manager.privacyPolicy.index', compact('privacyPolicy'));
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
        return view('property.privacyPolicy.create');
=======
        return view('property_manager.privacyPolicy.create');
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
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
            'description' => 'required',
        ]);
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->first();
        if ($privacyPolicy == null) {
            $privacyPolicy = new BuildingPrivacyPolicie();
        }
        $privacyPolicy->property_admin_id = Helpers::user_admin();
        $privacyPolicy->description = $request->description;
        $privacyPolicy->save();
        if ($privacyPolicy) {
<<<<<<< HEAD
            return redirect()->route('property.privacyPolicy.index',Helpers::user_login_route()['panel'])->with($this->message('Privacy Policy Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Privacy Policy Create Error','error'));
=======
            return redirect()->route('property_manager.privacyPolicy.index')->with(['alert' => 'success', 'message' => 'Privacy Policy Page Update Successfully']);
        } else {
            return redirect()->back()->with(['alert' => 'error', 'message' => 'Privacy Policy Page Update Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
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
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
<<<<<<< HEAD
    public function edit($panel,$id)
    {
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $building = Helpers::building_detail();
        return view('property.privacyPolicy.edit', compact('privacyPolicy', 'building'));
=======
    public function edit($id)
    {
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $building = Helpers::building_detail();
        return view('property_manager.privacyPolicy.edit', compact('privacyPolicy', 'building'));
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function update(Request $request,$panel, $id)
=======
    public function update(Request $request, $id)
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    {
        $request->validate([
            'description' => 'required',
        ]);
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $privacyPolicy->description = $request->description;
        $privacyPolicy->save();
        if ($privacyPolicy) {
<<<<<<< HEAD
            return redirect()->route('property.privacyPolicy.index',Helpers::user_login_route()['panel'])->with($this->message('Privacy Policy Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Privacy Policy Update Error','error'));
=======
            return redirect()->route('property_manager.privacyPolicy.index')->with(['success' => 'Privacy Policy Page Update Successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Privacy Policy Page Update Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
<<<<<<< HEAD
    public function destroy($panel,$id)
=======
    public function destroy($id)
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    {
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $privacyPolicy->delete();
        if ($privacyPolicy) {
<<<<<<< HEAD
            return response()->json(['status'=>'success','message' => 'Privacy Policy Page Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'Privacy Policy Page Delete Error']);
=======
            return redirect()->route('property_manager.privacyPolicy.index')->with(['success' => 'Privacy Policy Delete Successfully']);
        } else {
            return redirect()->back()->with(['error' => 'Privacy Policy Delete Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }
}

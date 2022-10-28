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
        return view('property.privacyPolicy.index', compact('privacyPolicy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('property.privacyPolicy.create');
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
            return redirect()->route('property.privacyPolicy.index',Helpers::user_login_route()['panel'])->with($this->message('Privacy Policy Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Privacy Policy Create Error','error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($panel,$id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($panel,$id)
    {
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $building = Helpers::building_detail();
        return view('property.privacyPolicy.edit', compact('privacyPolicy', 'building'));
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
            'description' => 'required',
        ]);
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $privacyPolicy->description = $request->description;
        $privacyPolicy->save();
        if ($privacyPolicy) {
            return redirect()->route('property.privacyPolicy.index',Helpers::user_login_route()['panel'])->with($this->message('Privacy Policy Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Privacy Policy Update Error','error'));
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
        $privacyPolicy = BuildingPrivacyPolicie::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $privacyPolicy->delete();
        if ($privacyPolicy) {
            return response()->json(['status'=>'success','message' => 'Privacy Policy Page Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'Privacy Policy Page Delete Error']);
        }
    }
}

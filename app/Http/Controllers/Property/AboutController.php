<?php

namespace App\Http\Controllers\Property;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->get();
        return view('property.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('property.about.create');
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->first();
        if ($about == null) {
            $about = new BuildingAbout();
        }
        $about->property_admin_id = Helpers::user_admin();
        $about->description = $request->description;
        $about->save();
        if ($about) {
            return redirect()->route('property.about.index',Helpers::user_login_route()['panel'])->with($this->message('About Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('About Update Error','error'));
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        return view('property.about.edit', compact('about'));
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $about->description = $request->description;
        $about->save();
        if ($about) {
            return redirect()->route('property.about.index',Helpers::user_login_route()['panel'])->with($this->message('About Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('About Create Error','error'));
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $about->delete();
        if ($about) {
            return response()->json(['status'=>'success','message' => 'About Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'About Delete Error']);
        }
    }
}

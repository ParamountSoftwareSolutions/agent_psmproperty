<?php

namespace App\Http\Controllers\PropertyManager;

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
<<<<<<< HEAD
        return view('property.about.index', compact('about'));
=======
        return view('property_manager.about.index', compact('about'));
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
        return view('property.about.create');
=======
        return view('property_manager.about.create');
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->first();
        if ($about == null) {
            $about = new BuildingAbout();
        }
        $about->property_admin_id = Helpers::user_admin();
        $about->description = $request->description;
        $about->save();
        if ($about) {
<<<<<<< HEAD
            return redirect()->route('property.about.index',Helpers::user_login_route()['panel'])->with($this->message('About Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('About Update Error','error'));
=======
            return redirect()->route('property_manager.about.index')->with(['alert' => 'success', 'message' => 'About Page Update Successfully']);
        } else {
            return redirect()->back()->with(['alert' => 'error', 'message' => 'About Page Update Error']);
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        return view('property.about.edit', compact('about'));
=======
    public function edit($id)
    {
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        return view('property_manager.about.edit', compact('about'));
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $about->description = $request->description;
        $about->save();
        if ($about) {
<<<<<<< HEAD
            return redirect()->route('property.about.index',Helpers::user_login_route()['panel'])->with($this->message('About Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('About Create Error','error'));
=======
            return redirect()->route('property_manager.about.index')->with(['success' => 'About Page Update Successfully']);
        } else {
            return redirect()->back()->with(['error' => 'About Page Update Error']);
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
        $about = BuildingAbout::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $about->delete();
        if ($about) {
<<<<<<< HEAD
            return response()->json(['status'=>'success','message' => 'About Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'About Delete Error']);
=======
            return redirect()->route('property_manager.about.index')->with(['success' => 'About Delete Successfully']);
        } else {
            return redirect()->back()->with(['error' => 'About Delete Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }
}

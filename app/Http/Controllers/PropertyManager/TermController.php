<?php

namespace App\Http\Controllers\PropertyManager;

use App\Helpers\Helpers;
use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\BuildingTermCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $terms = BuildingTermCondition::where('property_admin_id', Helpers::user_admin())->get();
<<<<<<< HEAD
        return view('property.term.index', compact('terms'));
=======
        return view('property_manager.term.index', compact('terms'));
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
        return view('property.term.create');
=======
        return view('property_manager.term.create');
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
        $request->validate([
            'description' => 'required',
        ]);
        $term = BuildingTermCondition::where('property_admin_id', Helpers::user_admin())->first();
        if($term == null){
            $term = new BuildingTermCondition();
        }
        $term->property_admin_id = Helpers::user_admin();
        $term->description = $request->description;
        $term->save();
        if($term){
<<<<<<< HEAD
            return redirect()->route('property.term.index',Helpers::user_login_route()['panel'])->with($this->message('Term Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Term Create Error','error'));
=======
            return redirect()->route('property_manager.term.index')->with(['success' => 'Term Create Successfully']);
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
        $term = BuildingTermCondition::findOrFail($id);
        return view('property.term.edit', compact('term'));
=======
    public function edit($id)
    {
        $term = BuildingTermCondition::findOrFail($id);
        return view('property_manager.term.edit', compact('term'));
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
=======
    public function update(Request $request, $id)
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
    {
        $request->validate([
            'description' => 'required',
        ]);
        $faq = BuildingTermCondition::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $faq->description = $request->description;
        $faq->save();
        if($faq){
<<<<<<< HEAD
            return redirect()->route('property.term.index',Helpers::user_login_route()['panel'])->with($this->message('Term Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Term Update Error','error'));
=======
            return redirect()->route('property_manager.term.index')->with(['success' => 'Term Update Successfully']);
        } else{
            return redirect()->back()->with(['error' => 'Term Update Error']);
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
        $term = BuildingTermCondition::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $term->delete();
        if($term){
<<<<<<< HEAD
            return response()->json(['status'=>'success','message' => 'Term Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'Term Delete Error']);
=======
            return redirect()->route('property_manager.term.index')->with(['success' => 'Faq Delete Successfully']);
        } else{
            return redirect()->back()->with(['error' => 'Faq Delete Error']);
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
        }
    }
}

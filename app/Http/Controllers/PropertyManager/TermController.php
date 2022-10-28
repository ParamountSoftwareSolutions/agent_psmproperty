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
        return view('property.term.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('property.term.create');
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
            return redirect()->route('property.term.index',Helpers::user_login_route()['panel'])->with($this->message('Term Create Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Term Create Error','error'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($panel,$id)
    {
        $term = BuildingTermCondition::findOrFail($id);
        return view('property.term.edit', compact('term'));
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
        $request->validate([
            'description' => 'required',
        ]);
        $faq = BuildingTermCondition::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $faq->description = $request->description;
        $faq->save();
        if($faq){
            return redirect()->route('property.term.index',Helpers::user_login_route()['panel'])->with($this->message('Term Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Term Update Error','error'));
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
        $term = BuildingTermCondition::where('property_admin_id', Helpers::user_admin())->findOrFail($id);
        $term->delete();
        if($term){
            return response()->json(['status'=>'success','message' => 'Term Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'Term Delete Error']);
        }
    }
}

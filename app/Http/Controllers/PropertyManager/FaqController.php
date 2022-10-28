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
        return view('property.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('property.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
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
        $faq = BuildingFaq::findOrFail($id);
        return view('property.faq.edit', compact('faq'));
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
        $faq = BuildingFaq::findOrFail($id);
        $faq->description = $request->description;
        $faq->save();
        if($faq){
            return redirect()->route('property.faq.index',Helpers::user_login_route()['panel'])->with($this->message('Faq Update Successfully','success'));
        } else{
            return redirect()->back()->with($this->message('Faq Update Error','error'));
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
        $faq = BuildingFaq::findOrFail($id);
        $faq->delete();
        if($faq){
            return response()->json(['status'=>'success','message' => 'Faq Delete Successfully']);
        } else {
            return response()->json(['status'=>'error','message' => 'Faq Delete Error']);
        }
    }
}

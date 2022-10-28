<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Floor;
use App\Models\Building;
use App\Models\User;
use App\Models\UserSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PropertyAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $property_admin = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'property_admin');
            })
            ->get();
        return view("admin.property_admin.index", compact('property_admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.property_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //dd($request->key);
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'building' => 'required',
        ]);
        foreach(explode(",", $request->floor) as $floorName) {
            if (Floor::where('name', $floorName)->exists()) {
                return redirect()->back()->with($this->message('Floor Name Already Exist', 'error'));
            } else{
                continue;
            }
        }
        $property_admin = new User();
        $property_admin->username = $request->username;
        $property_admin->email = $request->email;
        $property_admin->phone_number = $request->phone_number;
        $property_admin->password = $request->password;
        $property_admin->building = $request->building;
        $property_admin->save();

        foreach($request->key as $key => $value){
            $property_admin_setting = new UserSetting();
            $property_admin_setting->user_id = $property_admin->id;
            $property_admin_setting->key = $key;
            $property_admin_setting->status = $value;
            $property_admin_setting->save();
        }
        $role = Role::where('name', 'property_admin')->first();
        $property_admin->assignRole($role);
        if ($property_admin) {
            return redirect()->route('admin.property_admin.index')->with($this->message('Property Admin Create Successfully', 'success'));
        } else {
            return redirect()->back()->with($this->message('Property Admin Create Error', 'error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $property_admin = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'property_admin');
            })
            ->findOrFail($id);
        return view('admin.property_admin.edit', compact('property_admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'building' => 'required',
        ]);
        foreach(explode(",", $request->floor) as $floorName) {
            if (Floor::where('name', $floorName)->exists()) {
                return redirect()->back()->with($this->message('Floor Name Already Exist', 'error'));
            } else{
                continue;
            }
        }
        $property_admin = User::findOrFail($id);
        $property_admin->username = $request->username;
        $property_admin->email = $request->email;
        $property_admin->phone_number = $request->phone_number;
        $property_admin->building = $request->building;
        $property_admin->save();
        foreach($request->key as $key => $value){
            $property_admin_setting = UserSetting::where('user_id', $property_admin->id)->where('key', $key)->update([
                'status' => $value
            ]);
            /*$property_admin_setting->user_id = $property_admin->id;
            $property_admin_setting->key = $key;
            $property_admin_setting->status = $value;
            $property_admin_setting->save();*/
        }
        if ($property_admin) {
            return redirect()->route('admin.property_admin.index')->with($this->message('Property admin update auccessfully', 'success'));
        } else {
            return redirect()->back()->with($this->message('Property admin update error', 'error'));
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password_confirmation' => 'required',
            'password' => 'required|string|confirmed',
        ]);
        $user = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'property_admin');
            })->findOrFail($id);
        if (Hash::check($request->old_password, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            return redirect()->route('admin.property_admin.index')->with($this->message("Update password successfully", 'success'));
        } else {
            return redirect()->back()->with($this->message("Password dose not match", 'error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'property_admin');
            })->findOrFail($id);
        $user->forceDelete();

        if ($user) {
            return redirect()->route('admin.property_admin.index')->with($this->message('User Delete SuccessFully', 'success'));
        } else {
            return redirect()->back()->with($this->message("User Delete Error", 'error'));
        }
    }

    public function activate($id)
    {
        $user = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'property_admin');
            })->findOrFail($id);
        if ($user->status == 0) {
            $user->status = 1;
            $user->save();
            $propertyManager = Building::where('user_id',$id)->groupBy('manager_id')->pluck('manager_id')->toArray();
            $salePerson = Building::where('user_id',$id)->groupBy('sale_manager_id')->pluck('sale_manager_id')->toArray();
            $salePerson = $propertyManager+$salePerson;
            $users = User::whereIn('id',$salePerson)->get();
            foreach($users as $a){
                $a->status = 1;
                $a->save();
            }
            return redirect()->route('admin.property_admin.index')->with($this->message("User Activate Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->message("User Activate Error", 'error'));
        }
    }

    public function deactivate($id)
    {
        $user = User::with('roles')
            ->whereHas('roles', function ($q) {
                $q->Where('name', 'property_admin');
            })->findOrFail($id);
        if ($user->status == 1) {
            $user->status = 0;
            $user->save();

            $propertyManager = Building::where('user_id',$id)->groupBy('manager_id')->pluck('manager_id')->toArray();
            $salePerson = Building::where('user_id',$id)->groupBy('sale_manager_id')->pluck('sale_manager_id')->toArray();
            $salePerson = $propertyManager+$salePerson;
            $users = User::whereIn('id',$salePerson)->get();
            foreach($users as $a){
                $a->status = 0;
                $a->save();
            }
            return redirect()->route('admin.property_admin.index')->with($this->message("User DeActivate Successfully", 'success'));
        } else {
            return redirect()->back()->with($this->message("User DeActivate Error", 'error'));
        }
    }
}

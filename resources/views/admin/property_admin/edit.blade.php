@extends('admin.layout.app')
@section('title', 'Create New User')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ route('admin.property_admin.update', $property_admin->id) }}">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Edit User</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Society Admin Name</label>
                                            <input type="text" class="form-control" required="" name="username" value="{{ $property_admin->username }}">
                                            @error('username')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" required="" name="email"
                                                   autocomplete="off" value="{{ $property_admin->email }}">
                                            @error('email')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Phone</label>
                                            <input type="number" class="form-control" name="phone_number" value="{{ $property_admin->phone_number }}">
                                            @error('phone_number')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Building Allows</label>
                                            <input type="number" class="form-control" name="building" value="{{ $property_admin->building }}">
                                            @error('building')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($property_admin->user_setting as $value)
                                        <div class="form-group col-md-3">{{--@dd($value->status == 1, $value->key)--}}
                                            <div class="control-label">{{ ucfirst(str_replace("_", " ", $value->key)) }}</div>
                                            <label class="custom-switch mt-2 " style="margin-left: -2rem">
                                                <input type="hidden" name="key[{{$value->key}}]" value="0" class="custom-switch-input">
                                                <input type="checkbox" name="key[{{$value->key}}]" value="1" class="custom-switch-input"
                                                       @if($value->status == 1)
                                                checked
                                                    @endif>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        @endforeach
                                        {{--<div class="form-group col-md-3">
                                            <div class="control-label">Email module</div>
                                            <label class="custom-switch mt-2 " style="margin-left: -2rem">
                                                <input type="hidden" name="key[email_module]" value="0" class="custom-switch-input">
                                                <input type="checkbox" name="key[email_module]" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="control-label">SMS Module</div>
                                            <label class="custom-switch mt-2 " style="margin-left: -2rem">
                                                <input type="hidden" name="key[sms_module]" value="0" class="custom-switch-input">
                                                <input type="checkbox" name="key[sms_module]" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <div class="control-label">Facebook lead module</div>
                                            <label class="custom-switch mt-2 " style="margin-left: -2rem">
                                                <input type="hidden" name="key[facebook_lead_module]" value="0" class="custom-switch-input">
                                                <input type="checkbox" name="key[facebook_lead_module]" value="1" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>--}}
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ route('admin.property_admin.password.update', $property_admin->id) }}">
                                @csrf
                                <div class="card-header">
                                    <h4>Edit Password</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" name="old_password" autocomplete="off" required>
                                        @error('old_password')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" autocomplete="off" required>
                                        @error('password')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" autocomplete="off" required>
                                        @error('password_confirmation')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Update Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

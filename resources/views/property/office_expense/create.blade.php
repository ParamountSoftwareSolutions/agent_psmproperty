<<<<<<< HEAD
@extends('property_manager.layout.app')
=======
@extends('property.layout.app')
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
@section('title', 'Office Expense Create')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
<<<<<<< HEAD
                            <form method="post" action="{{ route('property_manager.office_expense.store') }}">
=======
                            <form method="post" action="{{ route('property.office_expense.store') }}">
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
                                @csrf
                                <div class="card-header">
                                    <h4>Basic Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
<<<<<<< HEAD
                                                <label>Select Building</label>
=======
                                                <label>Select Project</label>
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
                                                <select name="building_id" class="form-control" required>
                                                    @foreach($building as $data)
                                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('building_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category" class="form-control" id="">
                                                    <option value="" selected>Select Category</option>
                                                    <option value="furniture">furniture</option>
                                                    <option value="equipments">equipments</option>
                                                    <option value="stationary">stationary</option>
                                                    <option value="accessories">accessories</option>
                                                    <option value="general">general</option>
                                                    <option value="internet_bill">internet_bill</option>
                                                    <option value="landline">landline</option>
                                                    <option value="utility_bill">utility_bill</option>
                                                    <option value="electricity_bill">electricity_bill</option>
                                                </select>
                                                @error('category')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Cost</label>
                                            <input name="cost" type="number" class="form-control"
                                                   placeholder="Enter cost" required>
                                            @error('cost')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date</label>
                                            <input name="date" type="date" class="form-control" placeholder="Select Date" required>
                                            @error('date')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

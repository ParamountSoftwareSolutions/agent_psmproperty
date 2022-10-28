<<<<<<< HEAD
@extends('property_manager.layout.app')
=======
@extends('property.layout.app')
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
@section('title', 'Expense List')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Expense List</h4>
<<<<<<< HEAD
                                <a href="{{ route('property_manager.expense.create') }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New</a>
                                {{--<form action="{{ route('property_manager.expense_report') }}" method="post">
=======
                                <a href="{{ route('property.expense.create') }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New</a>
                                {{--<form action="{{ route('property.expense_report') }}" method="post">
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
                                    @csrf
                                    <input type="date" name="start_date" placeholder="Start Date">
                                    <input type="date" name="end_date" placeholder="End Date">
                                    <button type="submit">Submit</button>
                                </form>--}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
<<<<<<< HEAD
                                            <th>Building Name</th>
=======
                                            <th>Project Name</th>
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
                                            <th>Raw Material</th>
                                            <th>Qty</th>
                                            <th>Cost </th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($expenses as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->building->name }}</td>
                                                <td>{{ $data->raw_material}}</td>
                                                <td>{{ $data->qty}}</td>
                                                <td>{{ $data->cost}}</td>
                                                <td>{{ $data->date}}</td>
                                                <td>
<<<<<<< HEAD
                                                    <a href="{{ route('property_manager.expense.edit',$data->id) }}"
=======
                                                    <a href="{{ route('property.expense.edit',$data->id) }}"
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
                                                       class="btn btn-primary px-1 py-0" title="Edit">
                                                       <i class="fa fa-edit"></i>

                                                    </a>
<<<<<<< HEAD
                                                    <button type="button" data-url="{{ route('property_manager.expense.destroy',$data->id) }}" title="Delete" data-token="{!! csrf_token() !!}" class="btn btn-danger px-1 py-0 deleteBtn">
=======
                                                    <button type="button" data-url="{{ route('property.expense.destroy',$data->id) }}" title="Delete" data-token="{!! csrf_token() !!}" class="btn btn-danger px-1 py-0 deleteBtn">
>>>>>>> 0e5054f4838c84b65fe8f558a899f852d169cda1
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7"> No More Data In this Table.</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Expense List')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Investor Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Name: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">Ali Hassan: </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Email: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">ali@gmail.com: </label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Number: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">12345567: </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">CNIC: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">2345678: </label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Address: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <label style="font-size: 15px;">2345678: </label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Amount Received: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">2345678: </label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Invested Amount: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">2345678: </label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Remaining Amount: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">2345678: </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Investor Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Invested Amount</th>
                                            <th>Invested In</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>700</td>
                                            <td>Zaitoon City</td>
                                            <td>
                                                <a href="{{ route('property.investor.edit',['panel'=>Helpers::user_login_route()['panel'],'investor'=>1]) }}"
                                                   class="btn btn-primary px-1 py-0" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ route('property.investor.show',['panel'=>Helpers::user_login_route()['panel'],'investor'=>1]) }}"
                                                   class="btn btn-primary px-1 py-0" title="Edit">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button type="button" data-url="{{ route('property.investor.destroy',['panel'=>Helpers::user_login_route()['panel'],'investor'=>1]) }}" data-token="{{ csrf_token() }}" title="Delete" class="btn btn-danger px-1 py-0 deleteBtn">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        {{--@forelse($investor_history as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->user->username }}</td>
                                                <td>{{ $data->total_amount }}</td>
                                                <td>{{ $data->remaining_amount }}</td>
                                                <td>
                                                    <a href="{{ route('property.investor.edit',['panel'=>Helpers::user_login_route()['panel'],'investor'=>$data->id]) }}"
                                                       class="btn btn-primary px-1 py-0" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('property.investor.show',['panel'=>Helpers::user_login_route()['panel'],'investor'=>$data->id]) }}"
                                                       class="btn btn-primary px-1 py-0" title="Edit">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button type="button" data-url="{{ route('property.investor.destroy',['panel'=>Helpers::user_login_route()['panel'],'investor'=>$data->id]) }}" data-token="{{ csrf_token() }}" title="Delete" class="btn btn-danger px-1 py-0 deleteBtn">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7"> No More Data In this Table.</td>
                                            </tr>
                                        @endforelse --}}
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

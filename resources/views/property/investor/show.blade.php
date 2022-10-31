@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Expense List')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Investor</h4>
                                <a href="{{ route('property.investor.create',Helpers::user_login_route()['panel']) }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Amount</th>
                                            <th>Remaining</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @dd($investor_history)
                                        @forelse($investor_history as $data)
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

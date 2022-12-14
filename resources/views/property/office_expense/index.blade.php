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
                                <h4>Office Expense List</h4>
                                <a href="{{ route('property.office_expense.create',['panel'=>Helpers::user_login_route()['panel']]) }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Project Name</th>
                                            <th>Category</th>
                                            <th>Cost</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($office_expenses as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->building->name }}</td>
                                                <td>{{ $data->category_name->name }}</td>
                                                <td>{{ $data->cost }}</td>
                                                <td>{{ $data->date }}</td>
                                                <td>
                                                    <a href="{{ route('property.office_expense.edit',['panel'=>Helpers::user_login_route()['panel'],'office_expense'=>$data->id]) }}"
                                                       class="btn btn-primary px-1 py-0" title="Edit">
                                                       <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-url="{{ route('property.office_expense.destroy',['panel'=>Helpers::user_login_route()['panel'],'office_expense'=>$data->id]) }}" title="Delete" data-token="{!! csrf_token() !!}" class="btn btn-danger px-1 py-0 deleteBtn">
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

@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'All Users List')
@section('style')

@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Project List</h4>
                                <a href="{{ route('property.building.create',Helpers::user_login_route()['panel']) }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($buildings as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>
                                                    <div class="badge badge-success badge-shadow">Available</div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('property.building.edit',['panel'=>Helpers::user_login_route()['panel'],'building'=>$data->id]) }}"
                                                       class="btn btn-primary px-1 py-0" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a target="_blank" href="{{ route('property.building_view', ['panel' => Helpers::user_login_route()['panel'], 'id' => $data->id]) }}"
                                                       class="btn btn-primary px-1 py-0" title="View PDF">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button type="button" data-url="{{ route('property.building.destroy',['panel'=>Helpers::user_login_route()['panel'],'building'=>$data->id]) }}" data-token="{{ csrf_token() }}" title="Delete" class="btn btn-danger px-1 py-0 deleteBtn">
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
@section('script')
@endsection

@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>About</h4>
                                <a href="{{ route('property.about.create',['panel'=>Helpers::user_login_route()['panel']]) }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>About</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($about as $result)
                                            <tr>
                                                <td>{{$result->id}}</td>
                                                <td>{!! $result->description !!}</td>
                                                <td><a href="{{ route('property.about.edit',['panel'=>Helpers::user_login_route()['panel'],'about'=>$result->id]) }}"
                                                       class="btn btn-primary btn-sm mr-1 px-1 py-0"><i class="fa fa-edit"></i></a>
                                                    <button type="button" title="Delete" data-url="{{ route('property.about.destroy',['panel'=>Helpers::user_login_route()['panel'],'about'=>$result->id]) }}" data-token="{{ csrf_token() }}" class="btn btn-danger deleteBtn px-1 py-0">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <td>No more data in this table.</td>
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

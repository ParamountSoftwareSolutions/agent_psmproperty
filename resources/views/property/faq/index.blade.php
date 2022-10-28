@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h4>Faqs</h4>
                                <a href="{{ route('property.faq.create',['panel'=>Helpers::user_login_route()['panel']]) }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Faqs</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($faqs as $faq)
                                        <tr>
                                            <td>{{$faq->id}}</td>
                                            <td>{!! $faq->description !!}</td>
                                            <td>
                                                <a href="{{ route('property.faq.edit', ['panel'=>Helpers::user_login_route()['panel'],'faq'=>$faq->id]) }}" class="btn btn-primary btn-sm mr-1 px-1 py-0"><i class="fa fa-pencil"></i></a>
                                                <button type="button" title="Delete" data-url="{{ route('property.faq.destroy', ['panel'=>Helpers::user_login_route()['panel'],'faq'=>$faq->id]) }}" data-token="{{ csrf_token() }}" class="btn btn-danger deleteBtn px-1 py-0">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                            @empty
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


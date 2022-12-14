@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Comments')
@section('style')
<style>
    .dropdown-item
    {
        cursor: pointer;
    }
    .badge
    {
        color:white !important;

    }
    .btn-info:hover
    {
        color:white !important;
    }
</style>
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-right align-items-center">
                                <h4>Comments</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table text-center table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Status</th>
                                            <th>Client</th>
                                            <th>Comment</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($comments as $comment)
                                        @php
                                            $data=json_decode($comment->data);
                                        @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ ucfirst( Illuminate\Support\Str::replace('_', ' ', $data->status)) }}</td>
                                                <td>{{ $comment->building_sale->customer->username ?? '' }}</td>
                                                <td>{{ $comment->comment }}</td>
                                                <td>{{ $comment->created_at }}</td>
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

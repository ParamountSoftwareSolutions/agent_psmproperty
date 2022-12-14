@extends('property.layout.app')
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
                                <h4>{{ $floor->name }} Shop/Apartment List</h4>
                                <a href="{{ route('property.floor_detail.create', ['building_id' => $building_id, 'floor_id' => $floor_id]) }}" class="btn btn-primary"
                                   style="margin-left: auto; display: block;">Add New Shop/Apartment</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Number</th>
                                            <th>Area</th>
                                            <th>total_price</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($floor_detail as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->number }}</td>
                                                <td>{{ $data->area }} square feet</td>
                                                <td>{{ $data->total_price }} rs</td>
                                                <td><div class="badge badge-primary badge-shadow">{{ $data->type }}</div></td>
                                                <td>@if($data->status == 'sold')
                                                        <div class="badge badge-success badge-shadow">Sold</div>
                                                    @elseif($data->status == 'available')
                                                        <div class="badge badge-primary badge-shadow">Available</div>
                                                    @elseif($data->status == 'reserved')
                                                        <div class="badge badge-warning badge-shadow">Reserved</div>
                                                    @elseif($data->status == 'hold')
                                                        <div class="badge badge-info badge-shadow">hold</div>
                                                    @else
                                                        <div class="badge badge-danger badge-shadow">Cancel</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('property.floor_detail.edit', ['building_id' => $building_id, 'floor_id' => $floor_id, 'id' => $data->id]) }}"
                                                       class="btn btn-primary" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-edit">
                                                            <path
                                                                d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                            <path
                                                                d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                        </svg>

                                                    </a>
                                                    {{--<a href="{{ route('property.floor_detail.edit', ['building_id' => $building_id, 'floor_id' => $floor_id, 'id' => $data->id]) }}"
                                                       class="btn btn-primary" title="Detail">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-eye">
                                                            <path
                                                                d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                    </a>--}}
                                                    <form
                                                        action="{{ route('property.floor_detail.destroy', ['building_id' => $building_id, 'floor_id' => $floor_id, 'id' => $data->id]) }}"
                                                        method="post" style="display: inline-block;">
                                                        @csrf
                                                        <button type="submit" title="Delete" class="btn btn-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none"
                                                                 stroke="currentColor" stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-trash-2">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </button>
                                                    </form>
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

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
                                        <label style="font-size: 15px;">{{$investor->user->username}}</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Email: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">{{$investor->user->email}}</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Number: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">{{$investor->user->phone_number}}</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">CNIC: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">{{$investor->user->cnic}}</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Address: </label>
                                    </div>
                                    <div class="col-lg-10">
                                        <label style="font-size: 15px;">{{$investor->user->address}}</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Amount Received: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">{{number_format($investor->total_amount)}}</label>
                                    </div>
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Invested Amount: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">{{number_format($investor->history_sum_invested_amount)}}</label>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-2">
                                        <label style="font-weight: bold;font-size: 17px;">Remaining Amount: </label>
                                    </div>
                                    <div class="col-lg-4">
                                        <label style="font-size: 15px;">{{number_format($investor->remaining_amount)}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Investor History</h4>
                                <button class="btn btn-primary add_investment" style="margin-left: auto; display: block;">Add New</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped text-center" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Invested Amount</th>
                                            <th>Invested In</th>
                                            <th>Profit</th>
                                            <th>Created At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($investor->history as $data)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ number_format($data->invested_amount) }}</td>
                                                <td>{{ $data->building->name }}</td>
                                                <td>{{ $data->profit_percentage  }}</td>
                                                <td>{{ $data->created_at  }}</td>
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

    <!-- forward email modal -->
    <form method="post" action="{{ route('property.investor.add_investment',['panel'=>Helpers::user_login_route()['panel'],'id'=>$investor->id]) }}" id="callConnectForm">
        @csrf
        <div class="modal fade" id="callConnectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add Investment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Invested Amount</label>
                                <input type="number" name="invested_amount" class="form-control" max="{{$investor->remaining_amount}}" required>
                                @error('invested_amount')
                                <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>Invested In</label>
                                    <select name="invested_in" class="form-control" required>
                                        <option value="">Please Select</option>
                                        @foreach($buildings as $building)
                                            <option value="{{$building->id}}">{{$building->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('invested_in')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>Project Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Please Select</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ucwords($category->category)}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>Project Size</label>
                                    <select name="size_id" class="form-control">
                                        <option value="">Please Select</option>
                                        @foreach($sizes as $size)
                                            <option value="{{$size->id}}">{{$size->size}}</option>
                                        @endforeach
                                    </select>
                                    @error('size_id')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                                    @error('quantity')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label>Profit Percentage</label>
                                    <input type="number" name="profit_percentage" class="form-control" placeholder="Enter Profit Percentage">
                                    @error('profit_percentage')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.add_investment').click(function () {
                $('#callConnectModal').modal('show');
            });
            $('select[name="to"]').on('change', function () {
                var to = $(this).val();
                if(to == 'individual'){
                    $('#email').val('');
                    $('.email').show();
                }else{
                    $('.email').hide();
                    $('#email').val(to);
                }
            });
        });
    </script>
@endsection

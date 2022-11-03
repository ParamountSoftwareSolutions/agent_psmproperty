@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Office Expense Create')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form id="investor_create" method="post" action="{{ route('property.investor.store',Helpers::user_login_route()['panel']) }}">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h4>Personal Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Name <small style="color: red">*</small></label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                                                @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input name="email" type="text" class="form-control"
                                                   placeholder="Enter Email">
                                            @error('email')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Number <small style="color: red">*</small></label>
                                            <input name="phone_number" type="number" class="form-control"
                                                   placeholder="Enter Number" required>
                                            @error('phone_number')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>CNIC</label>
                                            <input name="cnic" type="number" class="form-control"
                                                   placeholder="Enter CNIC">
                                            @error('cnic')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label>Address</label>
                                            <input name="address" type="text" class="form-control"
                                                   placeholder="Enter Address">
                                            @error('address')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Investment Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Total Amount Received</label>
                                                <input type="number" name="total_amount" class="form-control" placeholder="Enter Total Amount" required>
                                                @error('total_amount')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Invested Amount</label>
                                                <input type="number" name="invested_amount" class="form-control" placeholder="Enter Invested Amount" required>
                                                @error('invested_amount')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
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
                                        <div class="form-group col-md-4">
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
                                        <div class="form-group col-md-4">
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
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Quantity</label>
                                                <input type="number" name="quantity" class="form-control" placeholder="Enter Quantity">
                                                @error('quantity')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Profit</label>
                                                <input type="number" name="profit" class="form-control" placeholder="Enter Profit">
                                                @error('profit')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Loss</label>
                                                <input type="number" name="loss" class="form-control" placeholder="Enter Loss">
                                                @error('loss')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Investor Profit Amount</label>
                                                <input type="number" name="investor_profit_amount" class="form-control" placeholder="Enter Investor Profit Amount">
                                                @error('investor_profit_amount')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
{{--                                        <div class="form-group col-md-4">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Remaining Amount</label>--}}
{{--                                                <input type="number" style="cursor: not-allowed" name="remaining_amount" class="form-control" placeholder="Enter Remaining Amount">--}}
{{--                                                @error('remaining_amount')--}}
{{--                                                <div class="text-danger mt-2">{{ $message }}</div>--}}
{{--                                                @enderror--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Profit Percentage</label>
                                                <input type="number" name="profit_percentage" class="form-control" placeholder="Enter Profit Percentage">
                                                @error('profit_percentage')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Return Amount</label>
                                                <input type="number" name="return_amount" class="form-control" placeholder="Enter Return Amount" required>
                                                @error('return_amount')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Return Amount Date</label>
                                                <input type="date" name="return_date" class="form-control">
                                                @error('return_date')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('input[name="total_amount"]').on('keyup keypress change',function () {
                let total_amount = $(this).val();
                $('input[name="invested_amount"]').attr('max',total_amount);
            })
        });
    </script>
@endsection

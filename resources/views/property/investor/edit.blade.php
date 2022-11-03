@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Office Expense Create')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form method="POST" action="{{ route('property.investor.update',['panel'=>Helpers::user_login_route()['panel'],'investor'=>$investor->id]) }}">
                            @csrf
                            @method('put')
                            <div class="card">
                                <div class="card-header">
                                    <h4>Personal Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Name <small style="color: red">*</small></label>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$investor->user->username}}" required>
                                                @error('name')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input name="email" type="text" class="form-control"
                                                   placeholder="Enter Email" value="{{$investor->user->email}}">
                                            @error('email')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Number <small style="color: red">*</small></label>
                                            <input name="phone_number" type="number" class="form-control"
                                                   placeholder="Enter Number" value="{{$investor->user->phone_number}}" required>
                                            @error('phone_number')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>CNIC</label>
                                            <input name="cnic" type="number" class="form-control"
                                                   placeholder="Enter CNIC" value="{{$investor->user->cnic}}">
                                            @error('cnic')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Address</label>
                                            <input name="address" type="text" class="form-control"
                                                   placeholder="Enter Address" value="{{$investor->user->address}}">
                                            @error('address')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Total Amount Received</label>
                                                <input type="number" name="total_amount" class="form-control" placeholder="Enter Total Amount" value="{{$investor->total_amount}}" required>
                                                @error('total_amount')
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
            $('input[name="total_amount"],input[name="investment_amount"]').on('keyup keypress change',function () {
                let total_amount = $('input[name="total_amount"]').val();
                let investment_amount = $('input[name="investment_amount"]').val();
                let remaining_amount = total_amount - investment_amount;
                $('input[name="remaining_amount"]').val(remaining_amount);
            })
            $('input[name="total_amount"]').on('keyup keypress change',function () {
                let total_amount = $(this).val();
                $('input[name="investment_amount"]').attr('max',total_amount);
            })
        });
    </script>
@endsection

@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Edit Client Form')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form id="clientUpdateForm">
                            <div class="card">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Basic Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Project List</label>
                                                <select class="form-control" name="building_id" required>
                                                    <option value="">Select Detail</option>
                                                    @forelse($building as $data)
                                                        <option value="{{ $data->id }}" {{ $data->id == $building_sale->building_id ? 'selected' : '' }}>{{ $data->name }}</option>
                                                    @empty
                                                        <option value="">N/A</option>
                                                    @endforelse
                                                </select>
                                                @error('building_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Block</label>
                                                <select class="form-control" name="block_id">
                                                    @if($building_sale->block_id)
                                                        <option value="{{ $building_sale->block_id }}" selected>{{ $building_sale->block->name }}</option>
                                                        <option label="" disabled>Select Detail</option>
                                                    @else
                                                        <option label="" disabled>Select Detail</option>
                                                    @endif
                                                </select>
                                                @error('block_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Inventory</label>
                                                <select class="form-control" name="inventory_id">
                                                    @if($building_sale->inventory_id)
                                                        <option value="{{ $building_sale->inventory_id }}" selected>Property
                                                            Number: {{ $building_sale->inventory->unit_no }} Property
                                                            Type: {{ $building_sale->inventory->type }}</option>
                                                        <option label="" disabled>Select Detail</option>
                                                    @else
                                                        <option label="" disabled>Select Detail</option>
                                                    @endif
                                                </select>
                                                @error('inventory_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if(!Helpers::isEmployee())
                                            <div class="form-group col-md-4">
                                                <div class="form-group">
                                                    <label>Sales Person</label>
                                                    <select class="form-control" name="sale_person_id" id="sale_person_id">
                                                        <option value="" >Select Sales Person</option>
														<option value="{{ auth()->user()->id }}">{{ auth()->user()->username }}</option>
                                                        @foreach($sales_person as $employee)
                                                            <option value="{{ $employee->id }}" {{ $building_sale->user_id == $employee->id ? 'selected' : '' }}>{{ $employee->username }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('sale_person_id')
                                                    <div class="text-danger mt-2">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group col-md-4">
                                            <label>Down Payment</label>
                                            <input type="number" class="form-control" name="down_payment"
                                                   value="{{ old('down_payment', $building_sale->down_payment) }}">
                                            @error('down_payment')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h4>Client Information</h4>
                                </div>
                                {{-- New Client Form --}}
                                <div class="card-body new-client-form">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Name</label>

                                            <input type="text" class="form-control" value="{{$building_sale->customer->username}}" name="name" autocomplete="false" required>
                                            @error('name')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Father Name</label>
                                            <input type="text" class="form-control" value="{{$building_sale->customer->father_name}}" name="fathername"
                                                   autocomplete="false" required>
                                            @error('fathername')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>CNIC Number</label>
                                            <input type="number" class="form-control" name="cnic" value="{{$building_sale->customer->cnic}}"
                                                   autocomplete="off" required>
                                            @error('cnic')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Email</label>
                                            <input type="email" class="form-control" name="email" value="{{$building_sale->customer->email}}" required>
                                            @error('email')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password"
                                                   autocomplete="off">
                                            @error('password')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Phone</label>
                                            <input type="text" class="form-control" name="phone_number" value="{{$building_sale->customer->phone_number}}" required>
                                            @error('phone_number')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Alternative Phone (Optional)</label>
                                            <input type="text" class="form-control" name="alt_phone" value="{{$building_sale->customer->alt_phone}}"
                                                   autocomplete="off">
                                            @error('alt_phone')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" value="{{$building_sale->customer->address}}"
                                                   autocomplete="off" required>
                                            @error('address')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Date of birth</label>
                                            <input type="date" class="form-control" name="dob" value="{{$building_sale->customer->dob}}"
                                                   autocomplete="off" required>
                                            @error('dob')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="country">Country</label>
                                            <select class="form-control" name="country_id" required>
                                                <option
                                                    value="{{ ($building_sale->customer->country_id == null) ? '': $building_sale->customer->country_id }}">
                                                    {{ ($building_sale->customer->country == null) ? 'Select Country' : $building_sale->customer->country->name  }}
                                                </option>
                                                @foreach($country as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('country_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>State</label>
                                                <select class="form-control" name="state_id" required>
                                                    <option
                                                        value="{{ ($building_sale->customer->state_id == null) ? '': $building_sale->customer->state_id }}">
                                                        {{ ($building_sale->customer->state == null) ? 'Select State' : $building_sale->customer->state->name  }}
                                                    </option>
                                                </select>
                                                @error('state_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>City</label>
                                                <select class="form-control" name="city_id">
                                                    <option
                                                        value="{{ ($building_sale->customer->city_id == null) ? '': $building_sale->customer->city_id }}">
                                                        {{ ($building_sale->customer->city == null) ? 'Select City' : $building_sale->customer->city->name  }}
                                                    </option>
                                                </select>
                                                @error('city_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="{{$building_sale->order_status}}">
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
            var building_id = $('select[name="building_id"]').find(":selected").val();
            if(building_id){
                var block_id = $('select[name="block_id"]').find(":selected").val();
                if(!block_id){
                    getBlock(building_id)
                }
                var inventory_id = $('select[name="inventory_id"]').find(":selected").val();
                if(!inventory_id){
                    getInventory(building_id)
                }
            }
            $('select[name="building_id"]').on('change', function() {
                var building_id = $(this).val();
                if (building_id) {
                    getInventory(building_id);
                    getBlock(building_id);
                } else {
                    alert('danger');
                }
            });
            // State Select
            $('select[name="country_id"]').on('change', function () {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: "{{ url((new App\Helpers\Helpers)->user_login_route()['panel'].'/sale/state') }}/" + country_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="state_id"]').empty();
                            if (data.length === 0) {
                                $('select[name="state_id"]').append('<option value="">N/A</option>');
                            } else {
                                $('select[name="state_id"]').append('<option value="">Please  Select</option>');
                                $.each(data, function (key, value) {
                                    $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            }
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            // City Select
            $('select[name="state_id"]').on('change', function () {
                var state_id = $(this).val();
                if (state_id) {
                    $.ajax({
                        url: "{{ url((new App\Helpers\Helpers)->user_login_route()['panel'].'/sale/city') }}/" + state_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="city_id"]').empty();
                            if (data.length === 0) {
                                $('select[name="city_id"]').append('<option value="">N/A</option>');
                            } else {
                                $('select[name="city_id"]').append('<option value="">Please  Select</option>');
                                $.each(data, function (key, value) {
                                    $('select[name="city_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            }
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('#clientUpdateForm').submit(function (e) {
                e.preventDefault();
                showLoader();
                let formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('property_manager.sale.client.update', ['panel' => (new App\Helpers\Helpers)->user_login_route()['panel'], 'client' => $building_sale->id]) }}",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                        hideLoader();
                        if(data.status == 'success'){
                            successMsg(data.message);
                            setTimeout(function () {
                                window.location.href = "{{ route('property_manager.sale.client.index', (new Helpers)->user_login_route()['panel']) }}";
                            },1000);
                        }
                        if(data.status == 'error'){
                            errorMsg(data.message);
                        }
                    },
                });
            });
        });
        function getBlock(building_id){
            $.ajax({
                url: "{{ url('property-manager/sale/building') }}/" + building_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="block_id"]').empty();
                    if (data.length === 0) {
                        $('select[name="block_id"]').append('<option value="">N/A</option>');
                    } else {
                        $('select[name="block_id"]').append('<option value="">Please Select</option>');
                        $.each(data, function(key, value) {
                            $('select[name="block_id"]').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                },
            });
        }
        function getInventory(building_id){
            $.ajax({
                url: "{{ url((new App\Helpers\Helpers)->user_login_route()['panel'].'/sale/block') }}/" + building_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="inventory_id"]').empty();
                    if (data.length === 0) {
                        $('select[name="inventory_id"]').append('<option value="">N/A</option>');
                    } else {
                        $('select[name="inventory_id"]').append('<option value="">Please  Select</option>');
                        $.each(data, function (key, value) {
                            let oldFloorDetailId = '{{ old('inventory_id') }}';
                            let selected = value.id == oldFloorDetailId ? "selected" : "";
                            $('select[name="inventory_id"]').append('<option '+selected+' value="' + value.id + '">' + "Inventory Number: " + value.unit_no + "  Inventono Type: " + value.type + '</option>');
                        });
                    }
                },
            });
        }
    </script>
@endsection


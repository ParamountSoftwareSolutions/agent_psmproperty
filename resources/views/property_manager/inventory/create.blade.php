@extends('property_manager.layout.app')
@section('title', 'Add New Project')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form method="post" action="{{ route('property_manager.inventory.store') }}" enctype="multipart/form-data">
                            <div class="card">
                                @csrf
                                <div class="card-header">
                                    <h4>Add Inventory</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Project <sup style="color: red">*</sup></label>
                                            <select class="form-control" name="building_id" required>
                                                <option label="" disabled selected>Select Project</option>
                                                @foreach($buildings as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('building_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Block List </label>
                                                <select class="form-control" name="block_id">
                                                    <option label="" disabled selected>Select Block</option>
                                                </select>
                                                @error('block_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4 simple">
                                            <label class="d-flex align-items-center">
                                                <label>Plot/Unit No <sup style="color: red">*</sup></label>
                                                <a href="#" style="margin-left: auto; display: block;" class="bulk-btn" data-value="bulk">Bluck Create</a>
                                            </label>
                                            <input type="text" class="form-control simple-input" name="simple_unit_no" value="{{ old('unit_no') }}">
                                            @error('unit_no')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4 bulk">
                                            <label class="d-flex align-items-center">
                                                <label>Plot/Unit No <sup style="color: red">*</sup></label>
                                                <a href="#" style="margin-left: auto; display: block;" class="bulk-btn" data-value="simple">Simple Create</a>
                                            </label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control bulk_unit_no" name="bulk_unit_no" class="input-group-text" value="{{ old
                                                ('unit_no') }}" placeholder="unit name">
                                                <div class="input-group-prepend preselection-prepend">
                                                    <div class="input-group-text">-</div>
                                                </div>
                                                <input type="number" class="form-control start_unit_no" name="start_unit_no" value="{{ old('start_unit_no') }}"
                                                       placeholder="start unit">
                                                <div class="input-group-prepend preselection-prepend">
                                                    <div class="input-group-text">-</div>
                                                </div>
                                                <input type="number" class="form-control end_unit_no" name="end_unit_no" value="{{ old('end_unit_no') }}"
                                                       placeholder="end
                                                 unit">
                                            </div>

                                            @error('simple_unit_no')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Category <sup style="color: red">*</sup></label>
                                                <select class="form-control" name="category_id" required>
                                                    <option label="" disabled selected>Select Category</option>
                                                    @foreach($category as $data)
                                                        <option value="{{ $data->id }}">{{ ucfirst($data->category) }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Nature <sup style="color: red">*</sup></label>
                                                <select class="form-control" name="nature" required>
                                                    <option label="" disabled selected>Select Nature</option>
                                                    <option value="commercial">Commercial</option>
                                                    <option value="semi_commercial">Semi Commercial</option>
                                                </select>
                                                @error('nature')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Type</label>
                                                <select class="form-control" name="type">
                                                    <option label="" disabled selected>Select Type</option>
                                                    <option value="corner">Corner</option>
                                                    <option value="front_facing">front_facing</option>
                                                    <option value="main_boulevard">Main Boulevard</option>
                                                    <option value="park_facing">Park Facing</option>
                                                </select>
                                                @error('nature')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Size</label>
                                            <select class="form-control" name="size_id">
                                                <option label="" disabled selected>Select Size</option>
                                                @foreach($size as $data)
                                                    <option value="{{ $data->id }}">{{ $data->size }}</option>
                                                @endforeach
                                            </select>
                                            @error('size')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Purchased Price</label>
                                            <input type="text" class="form-control" name="purchased_price" value="{{ old('purchased_price') }}">
                                            @error('purchased_price')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Sold Price</label>
                                            <input type="text" class="form-control" name="sold_price" value="{{ old('sold_price') }}">
                                            @error('sold_price')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Down Payment </label>
                                            <input type="text" class="form-control" name="down_payment" value="{{ old('down_payment') }}">
                                            @error('down_payment')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Staus</label>
                                            <select class="form-control" name="status">
                                                <option label="" disabled selected>Status</option>
                                                <option value="sold">sold</option>
                                                <option value="available">Available</option>
                                                <option value="hold">Hold</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>

                            {{--<!-- Multi Image Upload -->
                            <div class="card card-primary">
                                <div class="card-header ui-sortable-handle">
                                    <h4>Project Logo <small style="color: red">* (ratio 1:1)</small></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <div class="row" id="coba-logo"></div>
                                        </div>
                                    </div>
                                    @error('logo_images')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header ui-sortable-handle">
                                    <h4>Main Images <small style="color: red">* (ratio 1:1)</small></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <div class="row" id="coba"></div>
                                        </div>
                                    </div>
                                    @error('main_images')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header ui-sortable-handle">
                                    <h4>Banner Plan Images <small style="color: red">* (ratio 1:1)</small></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <div class="row" id="coba-banner"></div>
                                        </div>
                                    </div>
                                    @error('banner_images')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>--}}
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
            $('.bulk').hide();
            $('.simple-input').attr('required', true);

            $('select[name="building_id"]').on('change', function () {
                var building_id = $(this).val();
                if (building_id) {
                    $.ajax({
                        url: "{{ url('property/select/building') }}/" + building_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="block_id"]').empty();
                            if (data.length === 0) {
                                $('select[name="block_id"]').append('<option value="">N/A</option>');
                            } else {
                                $('select[name="block_id"]').append('<option value=""> -- Select Block -- </option>');
                                $.each(data, function (key, value) {
                                    let oldFloorId = '{{ old('block_id') }}';
                                    let selected = (value.id == oldFloorId) ? "selected" : "";
                                    $('select[name="block_id"]').append('<option ' + selected + ' value="' + value.id + '">' + value.name + '</option>');

                                });
                            }
                        },
                    });
                } else {
                    alert('danger');
                }
            });
            $('.bulk-btn').on('click', function () {
                var val = $(this).data('value');
                console.log(val);
                if (val == 'bulk') {
                    $('.bulk_unit_no').attr('required', true);
                    $('.start_unit_no').attr('required', true);
                    $('.end_unit_no').attr('required', true);

                    $('.simple-input').removeAttr('required', false);
                    $('.simple-input').css('display', 'none');
                    $('.simple-input').val('');

                    $('.bulk_unit_no').css('display', 'block');
                    $('.start_unit_no').css('display', 'block');
                    $('.end_unit_no').css('display', 'block');

                    $('.bulk').css('display', 'block');

                    $('.simple').hide();
                    $('.bulk').show();

                } else {
                    $('.simple-input').attr('required', true);

                    $('.bulk_unit_no').removeAttr('required', false);
                    $('.start_unit_no').removeAttr('required', false);
                    $('.end_unit_no').removeAttr('required', false);

                    $('.simple-input').css('display', 'block');

                    $('.bulk_unit_no').css('display', 'none');
                    $('.start_unit_no').css('display', 'none');
                    $('.end_unit_no').css('display', 'none');

                    $('.bulk_unit_no').val('');
                    $('.start_unit_no').val('');
                    $('.end_unit_no').val('');

                    $('.simple').show();
                    $('.bulk').hide();
                }


            });
            /*$('select[name="floor_id"]').on('change', function () {
                var floor_id = $(this).val();
                var building_id = $('select[name="building_id"]').find(":selected").val();
                if (floor_id) {
                    $.ajax({
                        url: "{{ url((new App\Helpers\Helpers)->user_login_route()['panel'].'/sale/floor') }}/" + floor_id + "/" + building_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="floor_detail_id"]').empty();
                            if (data.length === 0) {
                                $('select[name="floor_detail_id"]').append('<option value="">N/A</option>');
                            } else {
                                $('select[name="floor_detail_id"]').append('<option value="">Please  Select</option>');
                                $.each(data, function (key, value) {
                                    let oldFloorDetailId = '{{ old('floor_detail_id') }}';
                                    let selected = value.id == oldFloorDetailId ? "selected" : "";
                                    $('select[name="floor_detail_id"]').append('<option ' + selected + ' value="' + value.id + '">' + "Property Number: " + value.unit_id + "  Property Type: " + value.type + '</option>');
                                });
                            }
                        },
                    });
                } else {
                    alert('danger');
                }
            });*/
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $("#coba-banner").spartanMultiImagePicker({
                fieldName: 'banner_images[]',
                maxCount: 5,
                rowHeight: '215px',
                groupClassName: 'col-3',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{asset("public/panel/assets/img/img2.jpg")}}',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('Please only input png or jpg type file', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('File size too big', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $("#coba-logo").spartanMultiImagePicker({
                fieldName: 'logo_images[]',
                maxCount: 1,
                rowHeight: '215px',
                groupClassName: 'col-3',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{asset("public/panel/assets/img/img2.jpg")}}',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('Please only input png or jpg type file', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('File size too big', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $("#coba").spartanMultiImagePicker({
                fieldName: 'main_images[]',
                maxCount: 1,
                rowHeight: '215px',
                groupClassName: 'col-3',
                maxFileSize: '',
                placeholderImage: {
                    image: '{{asset("public/panel/assets/img/img2.jpg")}}',
                    width: '100%'
                },
                dropFileLabel: "Drop Here",
                onAddRow: function (index, file) {

                },
                onRenderedPreview: function (index) {

                },
                onRemoveRow: function (index) {

                },
                onExtensionErr: function (index, file) {
                    toastr.error('Please only input png or jpg type file', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                },
                onSizeErr: function (index, file) {
                    toastr.error('File size too big', {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
            });
        });
    </script>

@endsection

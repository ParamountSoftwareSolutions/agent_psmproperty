@extends('property.layout.app')
@section('title', 'Add New Project')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form method="post" action="{{ route('property.inventory.update', $inventory->id) }}" enctype="multipart/form-data">
                            <div class="card">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Edit Inventory</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Project <sup style="color: red">*</sup></label>
                                                <select class="form-control" name="building_id" required>
                                                    <option label="" disabled>Select Project</option>
                                                    @foreach($buildings as $data)
                                                        <option value="{{ $data->id }}" @if($inventory->building_id == $data->id) selected @endif>{{ $data->name
                                                        }}</option>
                                                    @endforeach
                                                </select>
                                                @error('building_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Block List </label>
                                                <select class="form-control" name="block_id">
                                                    <option value="{{ old('block_id', ($inventory->block !== null)? $inventory->block->name : '') }}" selected>{{
                                                   ($inventory->block !== null)? $inventory->block->name : ''
                                                    }}</option>
                                                </select>
                                                @error('block_id')
                                                <div class="text-danger mt-2">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Plot/Unit No <sup style="color: red">*</sup></label>
                                            <input type="text" class="form-control" name="unit_no" required
                                                   value="{{ old('unit_no', $inventory->unit_no) }}">
                                            @error('unit_no')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <div class="form-group">
                                                <label>Category <sup style="color: red">*</sup></label>
                                                <select class="form-control" name="category_id" required>
                                                    <option label="" disabled>Select Category</option>
                                                    @foreach($category as $data)
                                                        @if($inventory->category_id !== null)
                                                            <option value="{{ $data->id }}" @if($inventory->category_id == $data->id) selected @endif>{{ ucfirst
                                                        ($data->category)
                                                        }}</option>
                                                        @else
                                                            <option value="" selected >Select Category</option>
                                                            <option value="{{ $data->id }}">{{ ucfirst($data->category) }}</option>
                                                        @endif
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
                                                    <option label="" disabled>Select Nature</option>
                                                    <option value="commercial" @if($inventory->nature == 'commercial') selected @endif>Commercial</option>
                                                    <option value="semi_commercial" @if($inventory->nature == 'semi_commercial') selected @endif>Semi Commercial</option>
                                                    <option value="residential" @if($inventory->nature == 'residential') selected @endif>Residential</option>
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
                                                    <option label="" disabled>Select Type</option>
                                                    <option value="corner" @if($inventory->type == 'corner') selected @endif>Corner</option>
                                                    <option value="front_facing" @if($inventory->type == 'front_facing') selected @endif>Front facing</option>
                                                    <option value="main_boulevard" @if($inventory->type == 'main_boulevard') selected @endif>Main Boulevard</option>
                                                    <option value="park_facing" @if($inventory->type == 'park_facing') selected @endif>Park Facing</option>
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
                                                <option label="" disabled>Select Size</option>
                                                @foreach($size as $data)
                                                    <option value="{{ $data->id }}" @if($inventory->size_id == $data->id) selected @endif>{{ $data->size }}</option>
                                                @endforeach
                                            </select>
                                            @error('size')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Purchased Price</label>
                                            <input type="text" class="form-control" name="purchased_price" value="{{ old('purchased_price', $inventory->purchased_price)
                                            }}">
                                            @error('purchased_price')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Sold Price</label>
                                            <input type="text" class="form-control" name="sold_price" value="{{ old('sold_price', $inventory->sold_price) }}">
                                            @error('sold_price')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Status</label>
                                            <select class="form-control" name="status">
                                                <option label="" disabled>Status</option>
                                                <option value="sold" @if($inventory->status == 'sold') selected @endif>sold</option>
                                                <option value="available" @if($inventory->status == 'available') selected @endif>Available</option>
                                                <option value="hold" @if($inventory->status == 'hold') selected @endif>Hold</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Down Payment </label>
                                            <input type="text" class="form-control" name="down_payment" value="{{ old('down_payment', $inventory->down_payment) }}">
                                            @error('down_payment')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
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

    {{--Floor Plan Image--}}
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
@endsection

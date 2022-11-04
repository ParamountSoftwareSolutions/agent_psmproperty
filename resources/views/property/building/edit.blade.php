@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Edit Building')
@section('style')
    <style>
        .select2 .select2-container .select2-container--default .select2-container--below {
            width: 365px !important;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form method="post" action="{{ route('property.building.update', ['panel'=>Helpers::user_login_route()['panel'],'building'=>$building->id]) }}" enctype="multipart/form-data">
                            <div class="card">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Edit Building</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label>Project Code</label>
                                            <input type="text" class="form-control" name="code"
                                                   value="{{ old('code', $building->code) }}">
                                            @error('code')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Project Name</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ old('name', $building->name) }}">
                                            @error('name')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Start Date</label>
                                            <input type="date" class="form-control" name="start_date"
                                                   value="{{ old('start_date', $building->start_date) }}">
                                            @error('start_date')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>



                            </div>
                            {{--<div class="card card-primary">
                                <div class="card-header ui-sortable-handle">
                                    <h4>Logo Image <small style="color: red">* (ratio 1:1)</small></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <div class="row mb-3">
                                                @if($building->building_images->where('type', 'logo') !== null)
                                                    @foreach($building->building_images->where('type', 'logo') as $img)
                                                        <div class="col-3">
                                                            <img style="height: 200px;width: 100%" class="banner-image"
                                                                 src="{{asset($img->image)}}">
                                                            --}}{{--<a href=""
                                                               style="margin-top: -35px;border-radius: 0"
                                                               class="btn btn-danger btn-block btn-sm remove-image-logo"
                                                               data-id="{{ $img->id }}">Remove</a>--}}{{--
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                            <div id="coba-logo" class="row"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header ui-sortable-handle">
                                    <h4>Main Images <small style="color: red">* (ratio 1:1)</small></h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div>
                                            <div class="row mb-3">
                                                @if($building->building_images->where('type', 'main') !== null)
                                                    @foreach($building->building_images->where('type', 'main') as $img)
                                                        <div class="col-3">
                                                            <img style="height: 200px;width: 100%" class="banner-image"
                                                                 src="{{asset($img->image)}}">
                                                            --}}{{--<a href=""
                                                               style="margin-top: -35px;border-radius: 0"
                                                               class="btn btn-danger btn-block btn-sm remove-image-main"
                                                               data-id="{{ $img->id }}">Remove</a>--}}{{--
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
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
                                            <div class="row mb-3">
                                                @if($building->building_images->where('type', 'normal') !== null)
                                                    @foreach($building->building_images->where('type', 'normal') as $img)
                                                        <div class="col-3">
                                                            <img style="height: 200px;width: 100%" class="banner-image"
                                                                 src="{{asset($img->image)}}">
                                                            <a href=""
                                                               style="margin-top: -35px;border-radius: 0"
                                                               class="btn btn-danger btn-block btn-sm remove-image-banner"
                                                               data-id="{{ $img->id }}">Remove</a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
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
    <script>
        $('.remove-image-banner').on('click', function (e) {
            e.preventDefault();
            var id = $(this).data("id");
            console.log(id);
            var building_id = {{ $building->id }};
            if (id) {
                $.ajax({
                    url: "{{ url('property/building/banner/remove') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        building_id: building_id,
                    },
                    success: function (response) {
                        console.log(response.name);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 1500,
                            width: '27rem',
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                        Toast.fire({
                            icon: 'success',
                            title: 'Image Remove Successfully'
                        })
                    },
                });
            } else {
                alert('danger');
            }
        });
    </script>
@endsection

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{  asset('public/panel/assets/css/app.min.css') }}">
    <title>{{$building->name}}</title>
    <style>
        .building_heading{
            width: 100%;
            text-align: center;
            margin-bottom: 45px;
            margin-top: 30px;
        }
        .logo_img{
            padding-left: 30px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row print_area">
                    <div class="logo_img">
                        <img src="{{ asset('public/panel/assets/img/logo-pdf1.jpg') }}" alt="" width="35%" class="logo">
                    </div>
                    <div class="building_heading">
                        <h1 class="building">{{$building->name}}</h1>
                    </div>
                    <div class="col-lg-12">
                        @forelse($blocks as $block)
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4>{{ucwords($block->name)}}</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Unit No</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $block_inventory = \App\Models\BuildingInventory::where(['building_id'=>$building->id,'block_id'=>$block->id])->get();
                                        @endphp
                                        @forelse($block_inventory as $inventory)
                                            <tr>
                                                <th scope="row">{{ucwords($inventory->unit_no)}}</th>
                                                <td>{{ ($inventory->size == null) ? '' : $inventory->size->size }}</td>
                                                <td>{{ ($inventory->category == null) ? '' : ucwords($inventory->category->category) }}</td>
                                                <td>{{ucfirst($inventory->type)}}</td>
                                                <td>{{ucfirst($inventory->status)}}</td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5"><h5>No Inventries Found</h5></td></tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @empty
                            <div class="card"><h4>We Dont Have Any Records To This Building</h4></div>
                        @endforelse
                        @if($inventories->count())
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4>Inventories Without Blocks</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                        <tr>
                                            <th scope="col">Unit No</th>
                                            <th scope="col">Size</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($inventories as $inventory)
                                            <tr>
                                                <th scope="row">{{ucwords($inventory->unit_no)}}</th>
                                                <td>{{ ($inventory->size == null) ? '' : $inventory->size->size }}</td>
                                                <td>{{ ($inventory->category == null) ? '' : ucwords($inventory->category->category) }}</td>
                                                <td>{{ucfirst($inventory->type)}}</td>
                                                <td>{{ucfirst($inventory->status)}}</td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="5"><h5>No Inventries Found</h5></td></tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
{{--{{dd('eee')}}--}}

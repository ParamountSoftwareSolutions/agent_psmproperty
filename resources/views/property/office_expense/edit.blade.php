@extends((new App\Helpers\Helpers)->user_login_route()['file'].'.layout.app')
@section('title', 'Expense Edit')
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="post" action="{{ route('property.office_expense.update', ['panel'=>Helpers::user_login_route()['panel'],'office_expense'=>$office_expense->id]) }}">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Basic Information</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                            <label>Select Project</label>
                                            <select name="building_id" class="form-control" required>
                                                <option value="{{ $office_expense->building_id }}">{{ $office_expense->building->name }}</option>
                                                @foreach($building as $data)
                                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('building_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Category</label>
                                            <select name="category" class="form-control">
                                                <option value="" selected>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}" {{$category->id == $office_expense->category ? 'selected' : ''}}>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Cost</label>
                                            <input name="cost" type="number" class="form-control"
                                                   placeholder="Enter cost" required value="{{ $office_expense->cost }}">
                                            @error('cost')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date</label>
                                            <input name="date" type="date" class="form-control" placeholder="Select Date" required value="{{ $office_expense->date }}">
                                            @error('date')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@extends('dashboard.master')
@section('title')
    cazaClinic/add-SubService
@stop
@section('page-header')

@stop

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add New Sub-Service</span></h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Add Sub-Service</h5>
                    <div class="card-body">
                        <form method="post" action="{{route('subServices.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="formFileMultiple" class="form-label">Add New Sub-Service</label>
                                        <input class="form-control" name="name" type="text" id="formFileMultiple" />
                                    </div>
                                    <div class="col-6">
                                        <label for="formFileMultiple" class="form-label">Service</label>
                                        <select class="form-control" name="service_id">
                                            <option selected>Choose...</option>
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="formFileMultiple" class="form-label">Price</label>
                                        <input class="form-control" name="price" type="number" id="formFileMultiple" />
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- / Content -->

@endsection

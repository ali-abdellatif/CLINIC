@extends('dashboard.master')
@section('title')
cazaClinic/addService
@stop
@section('page-header')

@stop

@section('content')

<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add New Service</span></h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Add Service</h5>
                <div class="card-body">
                    <form method="post" action="{{route('services.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="formFileMultiple" class="form-label">Add New Service</label>
                                    <input class="form-control" name="name" type="text" id="formFileMultiple" />
                                </div>
                                <div class="col-6">
                                    <label for="formFileMultiple" class="form-label">Clinic</label>
                                    <select class="form-control" name="clinic_id">
                                        <option selected>Choose...</option>
                                        @foreach($clinics as $clinic)
                                            <option value="{{$clinic->id}}">{{$clinic->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="formFileMultiple" class="form-label">Choose Service Image</label>
                                    <input class="form-control" name="image" type="file" id="formFileMultiple" multiple />
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

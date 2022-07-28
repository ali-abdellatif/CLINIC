@extends('dashboard.master')
@section('title')
    cazaClinic/Add-Clinic
@stop
@section('page-header')

@stop

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add New Clinic</span></h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Add Clinic</h5>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{route('clinics.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label class="form-label">Clinic Name</label>
                                        <input class="form-control" name="name" type="text" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Address</label>
                                        <input class="form-control" name="address" type="text" />
                                    </div>

                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label class="form-label">longitude</label>
                                        <input class="form-control" name="longitude" type="text" />
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">latitude</label>
                                        <input class="form-control" name="latitude" type="text" />
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Choose City</label>
                                        <select class="form-control" name="city_id">
                                            <option selected>Choose...</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label class="form-label">Timing From</label>
                                        <input class="form-control" name="timing_from" type="time" />
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">timing to</label>
                                        <input class="form-control" name="timing_to" type="time" />
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Choose Your Image</label>
                                    <input class="form-control" name="image" type="file" id="formFileMultiple" multiple />
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

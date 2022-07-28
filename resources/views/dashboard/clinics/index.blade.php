@extends('dashboard.master')
@section('title')
    cazaClinic/Clinic
@stop
@section('page-header')

@stop
@section('css')
    @toastr_css
@stop

@section('content')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Clinic</span></h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="col-md-3" style="padding: 20px;">
                <a href="{{url(route('clinics.create'))}}"><button class="btn-info">add Clinic</button></a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Clinic Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>timing From</th>
                        <th>timing To</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php $i = 0; ?>
                    @foreach($clinics as $clinic)
                        <tr>
                            <?php $i++; ?>
                            <td>{{$i}}</td>
                            <td>{{$clinic->name}}</td>
                            <td>{{$clinic->address}}</td>
                            <td>{{App\Models\City::where('id',$clinic->city_id)->first()->name}}</td>
                            <td>{{$clinic->timing_from}} <span>am</span></td>
                            <td>{{$clinic->timing_to}} <span>pm</span></td>
                            <td><img width="120" src="{{asset('public/' . $clinic->image)}}"></td>
                            <td>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                        data-original-title="test" data-bs-target="#edit{{$clinic->id}}"><i class="fa fa-edit">edit</i>
                                </button>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-original-title="test" data-bs-target="#exampleModal{{$clinic->id}}"><i class="fa fa-remove">delete</i>
                                </button>
                            </td>
                        </tr>

                        <!-- edit_modal_Grade -->
                        <div class="modal fade" id="edit{{$clinic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> City Edit</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('clinics.update',$clinic->id)}}" method="post" enctype="multipart/form-data">
                                            {{ method_field('patch') }}
                                            @csrf
                                            <div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label class="form-label">Clinic Name</label>
                                                        <input class="form-control" name="name" type="text" value="{{$clinic->name}}" />
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Address</label>
                                                        <input class="form-control" name="address" type="text" value="{{$clinic->address}}" />
                                                    </div>

                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-4">
                                                        <label class="form-label">longitude</label>
                                                        <input class="form-control" name="longitude" type="text" value="{{$clinic->longitude}}" />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="form-label">latitude</label>
                                                        <input class="form-control" name="latitude" type="text" value="{{$clinic->latitude}}" />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="form-label">Choose City</label>
                                                        <select class="form-control" name="city_id">
                                                            <option selected>Choose...</option>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}" @if($city->id == $clinic->city_id) selected @endif>{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <label class="form-label">Timing From</label>
                                                        <input class="form-control" name="timing_from" type="time" value="{{$clinic->timing_from}}" />
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">timing to</label>
                                                        <input class="form-control" name="timing_to" type="time" value="{{$clinic->timing_to}}" />
                                                    </div>

                                                </div>
                                                <div class="mb-3">
                                                    <img width="120" src="{{asset('public/' . $clinic->image)}}">
                                                    <hr>
                                                    <label for="formFileMultiple" class="form-label">Choose Your Image</label>
                                                    <input class="form-control" name="image" type="file" id="formFileMultiple" multiple />
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal">close</button>
                                                <button class="btn btn-secondary" type="submit">submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- delete_modal_Grade -->
                        <div class="modal fade" id="exampleModal{{$clinic->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete City</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('clinics.destroy',$clinic->id)}}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        <input id="id" type="hidden" name="id" class="form-control"
                                               value="{{ $clinic->id }}">
                                        <div class="modal-body">Are You Sure To Delete This City</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Close</button>
                                            <button class="btn btn-secondary" type="submit">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->

    </div>
    <!-- / Content -->

@endsection
@section('script')
    @jquery
    @toastr_js
    @toastr_render
@endsection

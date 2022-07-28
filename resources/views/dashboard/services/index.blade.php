@extends('dashboard.master')
@section('title')
    cazaClinic/Services
@stop
@section('page-header')

@stop
@section('css')
    @toastr_css
@stop

@section('content')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Services</span></h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="col-md-3" style="padding: 20px;">
                <a href="{{url(route('services.create'))}}"><button class="btn-info">add service</button></a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>service</th>
                        <th>clinic</th>
                        <th>image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php $i = 0; ?>
                    @foreach($services as $service)
                        <tr>
                            <?php $i++; ?>
                            <td>{{$i}}</td>
                            <td>{{$service->name}}</td>
                            <td>{{App\Models\Clinic::where('id',$service->clinic_id)->first()->name}}</td>
                                <td><img width="120" src="{{asset('public/' . $service->image)}}"></td>
                            <td>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                        data-original-title="test" data-bs-target="#edit{{$service->id}}"><i class="fa fa-edit">edit</i>
                                </button>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-original-title="test" data-bs-target="#exampleModal{{$service->id}}"><i class="fa fa-remove">delete</i>
                                </button>
                            </td>
                        </tr>

                        <!-- edit_modal_Grade -->
                        <div class="modal fade" id="edit{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> City Edit</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('services.update',$service->id)}}" method="post" enctype="multipart/form-data">
                                            {{ method_field('patch') }}
                                            @csrf
                                            <div>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label>Service Name</label>
                                                        <input class="form-control" type="text" aria-label="file example" name="name" value="{{$service->name}}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="formFileMultiple" class="form-label">Clinic</label>
                                                        <select class="form-control" name="clinic_id">
                                                            <option selected>Choose...</option>
                                                            @foreach($clinics as $clinic)
                                                                <option value="{{$clinic->id}}" @if($clinic->id == $service->clinic_id) selected @endif>{{$clinic->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div>
                                                        <img width="120" src="{{asset('public/' . $service->image)}}">
                                                        <label>Image</label>
                                                        <input class="form-control" type="file" aria-label="file example" name="image">
                                                    </div>
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
                        <div class="modal fade" id="exampleModal{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Service</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('services.destroy',$service->id)}}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        <input id="id" type="hidden" name="id" class="form-control"
                                               value="{{ $service->id }}">
                                        <div class="modal-body">Are You Sure To Delete This service</div>
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

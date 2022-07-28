@extends('dashboard.master')
@section('title')
    cazaClinic/Cities
@stop
@section('page-header')

@stop
@section('css')
    @toastr_css
@stop

@section('content')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cities</span></h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <div class="col-md-3" style="padding: 20px;">
                <a href="{{url(route('cities.create'))}}"><button class="btn-info">add City</button></a>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>City Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php $i = 0; ?>
                    @foreach($cities as $city)
                        <tr>
                            <?php $i++; ?>
                            <td>{{$i}}</td>
                            <td>{{$city->name}}</td>
                            <td>
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                        data-original-title="test" data-bs-target="#edit{{$city->id}}"><i class="fa fa-edit">edit</i>
                                </button>
                                <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-original-title="test" data-bs-target="#exampleModal{{$city->id}}"><i class="fa fa-remove">delete</i>
                                </button>
                            </td>
                        </tr>

                        <!-- edit_modal_Grade -->
                        <div class="modal fade" id="edit{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> City Edit</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('cities.update',$city->id)}}" method="post" enctype="multipart/form-data">
                                            {{ method_field('patch') }}
                                            @csrf
                                            <div>
                                                <div>
                                                    <label>City Name</label>
                                                    <input class="form-control" type="text" aria-label="file example" name="name" value="{{$city->name}}">
                                                </div>
                                                <br>

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
                        <div class="modal fade" id="exampleModal{{$city->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete City</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('cities.destroy',$city->id)}}" method="post">
                                        {{ method_field('Delete') }}
                                        @csrf
                                        <input id="id" type="hidden" name="id" class="form-control"
                                               value="{{ $city->id }}">
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

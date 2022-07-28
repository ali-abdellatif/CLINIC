@extends('dashboard.master')
@section('title')
    cazaClinic/Banners
@stop
@section('page-header')

@stop

@section('content')

    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add New Banner</span></h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Add Banner</h5>
                    <div class="card-body">
                        <form method="post" action="{{route('banners.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="mb-3">
                                    <label for="formFileMultiple" class="form-label">Multiple files input example</label>
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

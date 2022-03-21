@extends('admin.master.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Banner Upload</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Banner Upload</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Banner</h4>
                    <div class="text-center">
                        <form action="{{ route('update-banner',['id' => $banner->id]) }}" class="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="fallback my-lg-5 p-5 dropzone">
                                <input name="image" type="file" multiple="multiple">
                                <img src="{{ asset($banner->image) }}" alt="" width="300" height="150">
                            </div>
                            <div class="text-center mt-4">
                                <input type="submit" class="btn btn-primary waves-effect waves-light" value="Edit Banner">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

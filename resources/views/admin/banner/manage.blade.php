@extends('admin.master.master')

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Manage Banner</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Banner</a></li>
                        <li class="breadcrumb-item active">Manage Banner</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-8 mx-auto">
            <div class="card">
                <h5 class="text-center text-success">{{ Session::get('message') }}</h5>
                <div class="card-body">
                    @foreach($banner as $img)
                        <img src="{{ asset($img->image) }}" alt="" width="50%" class="card-img-top">
                    @endforeach
                </div>
                <a href="{{ route('edit-banner',['id' => $img->id]) }}" class="btn btn-primary waves-effect waves-light w-25">Edit</a>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

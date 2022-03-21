@extends('admin.master.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Teacher</h4>
                    <p class="text-center text-success">{{ Session::get('message') }}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th width="5%">Image</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th>Experience</th>
                                <th>Summary</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><img src="{{ asset($about->image) }}" alt="" width="100%"></td>
                                    <td>{{ $about->phone }}</td>
                                    <td>{{ $about->city }}</td>
                                    <td>{{ $about->experience }} {{ $about->experience == 1 ? 'Year' : 'Years'}}</td>
                                    <td>{{ strip_tags($about->summary) }}</td>
                                    <td>
                                        <a href="{{ route('edit-about', ['id'=> $about->id]) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete-about', ['id'=> $about->id]) }}" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

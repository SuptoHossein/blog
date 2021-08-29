@extends('layouts.admin')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Post List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                    <li class="breadcrumb-item active">Show Post</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Post - {{ $post->title }}</h3>
                            <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-angle-left"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="card-body p-0 m-3">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Image</th>
                                        <td>
                                            <div style="max-width: 300px;max-height: 300px;overflow: hidden;"><img src="{{ asset('/storage/post/' . $post->image) }}" class="img-fluid" alt=""></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px;">Title</th>
                                        <td>{{ $post->title }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px;">Category</th>
                                        <td>{{ $post->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px;">Tags</th>
                                        <td>
                                            @foreach ($post->tags as $t)
                                                <div class="badge badge-primary">{{ $t->name }}</div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px;">Author Name</th>
                                        <td>{{ $post->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 200px;">Description</th>
                                        <td>{!! $post->description !!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

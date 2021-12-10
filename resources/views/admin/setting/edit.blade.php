@extends('layouts.admin')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Setting</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                    <li class="breadcrumb-item active">Edit Setting</li>
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
                            <h3 class="card-title">Edit Site Setting</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route('post.update', [$setting->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        @include('includes.error')
                                        <div class="form-group">
                                            <label for="title">Post Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{ $setting->title }}">
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-8">
                                                    <label for="image">Image</label>

                                                    <div class="form-group">
                                                       <!-- <label for="customFile">Custom File</label> -->
                                                       <div class="custom-file">
                                                           <label class="custom-file-label" for="customFile">Choose File</label>
                                                           <input type="file" class="custom-file-input" name="image" id="customFile">
                                                       </div>
                                                   </div>
                                                </div>
                                                <div class="col-4">
                                                    <div style="max-width: 100px;max-height: 100px;overflow: hidden;margin-left: auto">
                                                        <img src="{{ asset('storage/post/' . $setting->image) }}" class="img-fluid" alt="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                       


                                        <div class="form-group">
                                            <label for="description">Post Description</label>
                                            <textarea id="summernote" name="description" class="form-control" id="" rows="3"
                                                placeholder="Post description"> {{ $setting->description }} </textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.css">
@endsection()

@section('script')
    <script src="{{ asset('admin') }}/plugins/summernote/summernote-bs4.min.js"></script>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 300
        });
    </script>

@endsection()

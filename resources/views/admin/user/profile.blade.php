@extends('layouts.admin')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
                    <li class="breadcrumb-item active">Create User</li>
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
                            <h3 class="card-title">User Profile</h3>
                            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-angle-left"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-9">
                                <form action="{{ route('user.profile.update') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="card-body">
                                        @include('includes.error')
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name">User Name</label>
                                                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                                        value="{{ $user->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">User Email</label>
                                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                                        value="{{ $user->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">User password</label>
                                                    <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter password">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="image">User Image</label>

                                                     <div class="form-group">
                                                        <!-- <label for="customFile">Custom File</label> -->
                                                        <div class="custom-file">
                                                            <label class="custom-file-label" for="customFile">Choose File</label>
                                                            <input type="file" class="custom-file-input" name="image" id="customFile">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">User Description</label>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="4" placeholder="Write your Bio"></textarea>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                            @if ($user->image)
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div style="width: 200px;height: 200px;overflow:hidden;" class="m-auto">
                                                <img src="{{ asset('storage/user/'.$user->image) }}" class="img-fluid rounded-circle " alt="">
                                            </div>
                                            <h5 class="mt-2">{{ $user->name }}</h5>
                                            <p class="mb-0">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
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

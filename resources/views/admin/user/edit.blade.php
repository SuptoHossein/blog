@extends('layouts.admin')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Category List</a></li>
                    <li class="breadcrumb-item active">Edit User</li>
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
                            <h3 class="card-title">Edit User</h3>
                            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm"><i class="fas fa-angle-left"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <form action="{{ route('user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        @include('includes.error')
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
                                            <label for="password">User password <small>(Enter password if you want to change)</small></label>
                                            <input type="password" name="password" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter password">
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
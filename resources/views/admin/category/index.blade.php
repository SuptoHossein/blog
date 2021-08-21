@extends('layouts.admin')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item active">Category List</li>
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
                            <h3 class="card-title">Category List</h3>
                            <a href="{{ route('category.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 5%">#</th>
                                    <th style="width: 50%">Name</th>
                                    <th style="width: 20%">Slug</th>
                                    <th style="width: 15%">Post Count</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->id }}</td>
                                        <td class="d-flex">
                                            {{-- <a href="{{ route('category.show', [$category->id]) }}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i></a> --}}
                                            <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-success btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('category.destroy', [$category->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf  
                                                <button type="submit" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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

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
                    <li class="breadcrumb-item active">Post List</li>
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
                            <h3 class="card-title">Post List</h3>
                            <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 2%">#</th>
                                    <th style="width: 10%">Image</th>
                                    <th style="width: 50%">Title</th>
                                    <th style="width: 10%">Category</th>
                                    <th style="width: 10%">Author</th>
                                    <th style="width: 10%">Tags</th>
                                    <th style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $key => $post)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            {{-- <div style="max-width: 70px;max-height: 70px;overflow: hidden;">
                                                <img src="{{ asset('storage/post/'.$post->image) }}" class="img-fluid">
                                            </div> --}}
                                            <div style="max-width: 70px;max-height: 70px;overflow: hidden;">
                                                <img src="{{ asset($post->image) }}" class="img-fluid">
                                            </div>
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            @foreach ($post->tags as $t)
                                                <div class="badge badge-primary">{{ $t->name }}</div>
                                            @endforeach
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('post.edit', [$post->id]) }}" class="btn btn-success btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('post.destroy', [$post->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm mr-1"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                       <td colspan="7" class="text-danger text-center">No Post found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

                {{-- Pagination --}}
                {{ $posts->links() }}


            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

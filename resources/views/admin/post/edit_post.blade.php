@extends('admin.master')
@section('title')
    Edit Post
@endsection
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Post</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{url('all_post')}}">Post List</a></li>
                        <li class="breadcrumb-item">Edit Post</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit Post</h3>
                                <a href="{{ route('all_post') }}" class="btn btn-primary">Go Back to Category List</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <form action="{{ route('update_post', $edit_post->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('admin.includes.errors')
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" value="{{$edit_post->title}}" class="form-control" id="title" placeholder="Enter title">
                                            </div>
                                            <div class="form-group">
                                                <label for="post_category">Post Category</label>
                                                <select name="category_id" class="form-control" id="post_category">
                                                    <option style="display: none" selected="">--Select Your Category--</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if($edit_post->category_id == $category->id) selected @endif>{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <img src="{{url($edit_post->image)}}" width="60" height="60">
                                                <input type="file" name="image" class="form-control" id="image" placeholder="Select Image">
                                            </div>
                                            <div class="form-group">
                                                <label>Choose Post Tags</label>
                                                <div class=" d-flex flex-wrap">
                                                    @foreach($tags as $tag)
                                                        <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                                            <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{ $tag->id}}" value="{{ $tag->id }}"
                                                                @foreach($edit_post->tags as $t)
                                                                    @if($tag->id == $t->id) checked @endif
                                                                    @endforeach
                                                            >
                                                            <label for="tag{{ $tag->id}}" class="custom-control-label">{{ $tag->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Description</label>
                                                <textarea name="description" id="summernote" rows="10" cols="50" class="form-control" placeholder="Enter description">{{ $edit_post->description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

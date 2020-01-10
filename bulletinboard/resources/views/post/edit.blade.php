@extends('layouts.app')

@section('title','Update Post')
@section('content')
@guest
<div class="card">
    <div class="card-header">
        <h3>Sorry my friend. Plase Login!!!!!</h3>
    </div>
</div>
@else
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Post</h3>
        </div>
        <div class="card-body">
            <div class="col-md-8 mx-auto">
                <form action="/post/{{$post_detail->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-md-2">Title</label>
                        <div class="col-md-6">
                            <input type="text" id="title" name="title" class="form-control" value="{{$post_detail->title}}">
                            @error('title')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <label for="require" class="col-md-1 col-form-label text-danger text-md-left">*</label>
                    </div>
                    <div class="form-group row">
                        <label for="desc" class="col-md-2">Description</label>
                        <div class="col-md-6">
                            <textarea name="desc" id="desc" class="form-control">{{$post_detail->description}}</textarea>
                            @error('desc')
                                <label class="text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <label for="require" class="col-md-1 col-form-label text-danger text-md-left">*</label>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-md-2">Status</label>
                        <div class="col-md-6">
                            <input type="checkbox" id="status" name="status" class="form-check-input col-md-1" value="1"
                            @if(old('status', $post_detail->status)=='1' ) {{"checked"}} @endif>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mr-4">Confirm</button>
                            <button type="reset" class="btn btn-light">Clear</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection

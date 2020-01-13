@extends('layouts.app')

@section('title','Post Create Confirm')
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
            <div class="col-md-12">
                <h3>Create Post Confirmation</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-8 mx-auto">
                <form action="/post/store" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4">Title</label>
                        <label for="title" class="col-md-4">{{$title}}</label>
                        <input type="hidden" name="title" value="{{$title}}">
                    </div>
                    <div class="form-group row">
                        <label for="desc" class="col-md-4">Description</label>
                        <label for="desc" class="col-md-4">{{$desc}}</label>
                        <input type="hidden" name="desc" value="{{$desc}}">
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary mr-4">Create</button>
                            <a href="/post/create" class="btn btn-dark">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
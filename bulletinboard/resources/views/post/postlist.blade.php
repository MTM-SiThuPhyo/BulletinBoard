@extends('layouts.app')

@section('title','PostList')
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
            <div class="col-md-3">
                <h3>Post List</h3>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <form action="/posts/search" method="POST" class="form-inline">
                    @csrf
                    <div class="form-group mb-2">
                        <input type="text" name="search" value="{{session('searchKeyword')}}" class="form-control form-control-md mb-4 mr-3" placeholder="Search...">
                        <button type="submit" class="btn btn-primary btn-md mb-4">Search</button>
                        <a href="/post/create" class="btn btn-primary btn-md mb-4 ml-4">Add</a>
                        <a href="/csv/upload" class="btn btn-primary btn-md mb-4 ml-4">Upload</a>
                        <a href="/download" class="btn btn-primary btn-md mb-4 ml-4">Download</a>
                    </div>
                </form>
            </div>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            <div class="row justify-content-center">
                <table class="table table-bordered">
                    <thead class="text-nowrap">
                        <th>Post Title</th>
                        <th>Post Description</th>
                        <th>Posted User</th>
                        <th>Posted Date</th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        @foreach($posts as $key => $post)
                            <tr>
                                <td><button class="btn btn-link">{{$post->title}}</button></td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->user->name}}</td>
                                <td>{{$post->created_at->format('Y/m/d')}}</td>
                                <td><a href="/post/{{$post->id}}" class="btn btn-primary">Edit</a></td>
                                <td><a href="#deleteConfirmModal" class="btn btn-danger postDelete">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <!-- pagination -->
                <ul class="pagination col-md-12 justify-content-center">
                    {{$posts->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endguest
@endsection
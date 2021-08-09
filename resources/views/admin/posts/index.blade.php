@extends('admin.app')

@section('title') {{ 'Post Manage' }} @endsection

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-cogs"></i> {{ 'Post Manage' }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row user">

        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('admin.posts.create')}}">Add New Post</a>
        </div>
        <div class="col-md-12">
            <div class="tab-content">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Image</td>
                        <td>Action</td>
                      </tr>
                    </thead>
                    <tbody>

                        @forelse ($posts as $post)
                            <tr>
                                <th scope="row">{{$post->id}}</th>
                                <td>{{$post->title}}</td>
                                <td>
                                    {{ $post->description }}</td>

                                <td>
                                    <img width="80px" src="{{url('') . $post->image}}" alt="{{$post->title}}">
                                </td>
                                <td>
                                    <a href="{{ route('admin.post_edit', $post->id)}}" class="btn btn-primary">Edit</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td>
                                No data available
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection

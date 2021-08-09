@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ 'Welcome....'}}
                </div>

            </div>
            @if (Auth::user()->roll->roll_name == 'editor')
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Posts') }}</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>

                            @forelse ($posts as $post)
                                <tr>
                                    <th scope="row">{{$post->id}}</th>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>
                                        <img width="70px" src="{{asset($post->image) }}" alt="{{$post->title}}">
                                    </td>
                                    <td>
                                        <a href="{{ route('user.post_edit', $post->id)}}" class="btn btn-primary">Edit</a>
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
            @endif

        </div>
    </div>
</div>
@endsection

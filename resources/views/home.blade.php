@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ 'See our latest posts....'}}

                    {{-- {{ __('You are logged in!') }}
                    {{Auth::user()->id}} --}}

                </div>

            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        @forelse ($posts as $post)
            <div class="col-md-3 m-2">
                <div class="card" style="width: 18rem;">
                    @if ($post->image != null)
                    <img class="card-img-top" src="{{ url($post->image)}}" alt="Card image cap">
                    @else
                    <img class="card-img-top" src="https://i0.wp.com/minarkhan.com/wp-content/uploads/2021/05/Screenshot_5.jpg?resize=750%2C494&ssl=1" alt="Card image cap">
                    @endif

                    <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{Str::limit($post->description, 100)}}
                    </p>
                    <a href="{{ route('user.post_edit', $post->id)}}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        @empty
            <h3>Post not available</h3>
        @endforelse
    </div>

</div>
@endsection

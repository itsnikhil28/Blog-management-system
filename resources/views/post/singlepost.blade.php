@extends('layouts.main')
@section('title', $post->title)
@section('content')
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <h4>{{ $post->content }}</h4>
                    <p> Posted by <i>{{ $post->author }}</i> on <i>{{ date('d M Y', strtotime($post->published_at)) }}</i>
                    </p>

                    @if (Auth::user()->name == $post->author)
                        <div class="d-flex">
                            <a class="btn btn-sm btn-primary text-uppercase" style="text-decoration: none; margin-right: 10px"
                                href="{{ route('posts.edit', $post->slug) }}">Edit Post →</a>
                            <form action="{{ route('posts.destroy', $post->slug) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger text-uppercase"
                                    style="text-decoration: none">
                                    Delete Post →
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </article>
@endsection

@extends('layouts.main')
@section('imagefortitle', 'post-bg.jpg')
@section('title', 'Blog Management System')
@section('subheading', 'A Mini Project')
@section('content')
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                @if (session('error'))
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                @if (session('success'))
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                <div class="d-flex justify-content-end">
                    <div class="col-md-4 flex-end">
                        <form action="{{route('posts.index')}}" method="get">
                            <input type="search" name="search" placeholder="Search..." class="form-control">
                            
                        </form>
                    </div>
                </div>
                @foreach ($posts as $post)
                    <div class="col-md-10 col-lg-10 col-xl-7">
                        <h2>{{ $post->title }}</h2>
                        <p>{{ substr($post->content, 0, 30) }}...

                            <a class="btn btn-sm btn-primary text-uppercase mr-4" style="text-decoration: none"
                                href="{{ route('posts.show', $post->slug) }}">Read More →</a> <br>
                            @if (Auth::user()->name == $post->author)
                                <div class="d-flex">
                                    <a class="btn btn-sm btn-primary text-uppercase"
                                        style="text-decoration: none; margin-right: 10px"
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

                        </p>
                    </div>

                    <hr class="my-4 mx-5" />
                @endforeach
            </div>
        </div>
    </article>
@endsection

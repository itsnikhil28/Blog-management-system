@extends('layouts.main')
@section('imagefortitle', 'home-bg.jpg')
@section('title', isset($post) ?' Edit Post' : 'Create Post')
@section('subheading', isset($post) ? 'Edit your post' : 'Create a new blog post')
@section('content')
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="my-5">
                        <form
                            @auth @if (isset($post)) action="{{ route('posts.update', $post->slug) }}" @else action="{{ route('posts.store') }}" @endif method="POST" @endauth
                            class="d-inline">
                            @csrf

                            @if (isset($post))
                            @method('PUT')
                            @endif
                            <div class="form-floating">
                                <input class="form-control" id="title" name="title" type="text"
                                    placeholder="Enter your title..." data-sb-validations="required"
                                    @if (isset($post)) value="{{ $post->title }}" @endif />
                                <label for="title">Title</label>
                                @error('title')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" name="content" id="content" placeholder="Enter your content here..."
                                    style="height: 12rem" data-sb-validations="required">@if (isset($post)){{ $post->content }}@endif</textarea>
                                <label for="message">Content</label>
                                @error('content')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="author" name="author" type="text"
                                    placeholder="Enter your name..." data-sb-validations="required"
                                    @if (Auth::user()) value="{{ Auth::user()->name }}" @endif readonly />
                                <label for="author">Author</label>
                            </div>
                            <br />
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                </div>
                            </div>
                            <div class="d-none" id="submitErrorMessage">
                                <div class="text-center text-danger mb-3">Error sending message!</div>
                            </div>
                            @auth
                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">@if(isset($post)) Update @else Create @endif</button>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-primary text-uppercase">Login</a>
                            @endauth
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

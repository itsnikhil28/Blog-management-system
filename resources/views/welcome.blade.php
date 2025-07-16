@extends('layouts.main')
@section('imagefortitle', 'home-bg.jpg')
@section('title', 'Blog Management System')
@section('subheading', 'A Mini Project')
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @if (count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="post-preview">
                            <a href="{{route('posts.show',$post->slug)}}">
                                <h2 class="post-title">{{ $post->title }}</h2>
                                <h3 class="post-subtitle">{{ substr($post->content, 0, 30) . '...' }}</h3>
                            </a>
                            <p class="post-meta">
                                Posted by
                                <a href="javascript:void(0)">{{ $post->author }}</a>
                                on {{ $post->published_at }}
                            </p>
                        </div>
                        <!-- Divider-->
                        <hr class="my-4" />
                    @endforeach
                @else
                    <div class="post-preview">
                        <h3>No Posts Found</h3>
                        <p>Please create a post to see it here.</p>
                    </div>
                @endif
                {{-- <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">Man must explore, and this is exploration at its greatest</h2>
                            <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2023
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" /> --}}
                <!-- Post preview-->
                {{-- <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">I believe every human has a finite number of heartbeats. I don't intend to
                            waste any of mine.</h2>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on September 18, 2023
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">Science has not yet mastered prophecy</h2>
                        <h3 class="post-subtitle">We predict too much for the next year and yet far too little for the next
                            ten.</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on August 24, 2023
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" />
                <!-- Post preview-->
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">Failure is not an option</h2>
                        <h3 class="post-subtitle">Many say exploration is part of our destiny, but it’s actually our duty to
                            future generations.</h3>
                    </a>
                    <p class="post-meta">
                        Posted by
                        <a href="#!">Start Bootstrap</a>
                        on July 8, 2023
                    </p>
                </div>
                <!-- Divider-->
                <hr class="my-4" /> --}}
                <!-- Pager-->
                <div class="d-flex justify-content-end mb-4">
                    @if (Auth::user())
                        @if($posts->count() > 0)
                            <a class="btn btn-primary text-uppercase" href="{{ route('posts.index') }}">All Posts →</a>
                        @else
                            <a class="btn btn-primary text-uppercase" href="{{ route('posts.create') }}">Create Post →</a>
                        @endif
                    @else
                        <a class="btn btn-primary text-uppercase" href="{{ route('login') }}">Login →</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.frontend')


@section('content')

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Tag: {{$tag->name}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->



    <div class="container">
        <div class="row medium-padding120">
            <main class="main">

                <div class="row">
                    <div class="case-item-wrap">

                        @foreach($tag->posts as $post)

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{$post->featured}}" alt="{{$post->title}}">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{route('post.single',$post->slug)}}">{{$post->title}}</a></h6>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
        </div>

        <!-- End Post Details -->
        <br>
        <br>
        <br>
        <!-- Sidebar-->



        <!-- End Sidebar-->

        </main>
    </div>
    </div>

@stop
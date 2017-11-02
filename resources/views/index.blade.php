@extends('layouts.frontend')

@section('content')
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset($latest_post->featured)}}" alt="{{$latest_post->title}}">
                            <div class="overlay"></div>
                            <a href="{{asset($latest_post->featured)}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center  ">
                                    <a class="" href="{{route('post.single',$latest_post->slug)}}">{{$latest_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$latest_post->created_at->toFormattedDateString()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$latest_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
                <div class="col-lg-2"></div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset($second_post->featured)}}" alt="{{$second_post->title}}">
                            <div class="overlay"></div>
                            <a href="{{asset($second_post->featured)}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center ">
                                    <a href="15_blog_details.html">{{$second_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$second_post->created_at->toFormattedDateString()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$second_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
                <div class="col-lg-6">
                    <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{asset($third_post->featured)}}" alt="{{$third_post->title}}">
                            <div class="overlay"></div>
                            <a href="{{asset($third_post->featured)}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                <h2 class="post__title entry-title text-center">
                                    <a href="15_blog_details.html">{{$third_post->title}}</a>
                                </h2>

                                <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$third_post->created_at->toFormattedDateString()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{$third_post->category->name}}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                </div>
                            </div>
                        </div>

                    </article>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row medium-padding120 bg-border-color">
                <div class="container">
                    <div class="col-lg-12">
                        <div class="offers">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$laravel->name}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">

                                    @foreach($laravel_posts as $post)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="case-item">
                                                <div class="case-item__thumb">
                                                    <img src="{{asset($post->featured)}}" alt="{{$post->title}}">
                                                </div>
                                                <h6 class="case-item__title"><a href="#">{{$post->title}}</a></h6>
                                            </div>
                                        </div>


                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="padded-50"></div>
                        <div class="offers">
                            <div class="row">
                                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                    <div class="heading">
                                        <h4 class="h1 heading-title">{{$javascript->name}}</h4>
                                        <div class="heading-line">
                                            <span class="short-line"></span>
                                            <span class="long-line"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="case-item-wrap">
                                    @foreach($javascript_posts as $post)
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="case-item">
                                                <div class="case-item__thumb">
                                                    <img src="{{asset($post->featured)}}" alt="{{$post->title}}">
                                                </div>
                                                <h6 class="case-item__title"><a href="#">{{$post->title}}</a></h6>
                                            </div>
                                        </div>


                                    @endforeach



                                </div>
                            </div>
                        </div>
                        <div class="padded-50"></div>


                    </div>
                </div>
            </div>
        </div>


@stop
@extends('layouts.app')


@section('content')

    <div class="panel panel-primary">

        <div class="panel-heading">
            <h3 class="panel-title">Published posts</h3>
        </div>

        <div class="panel-body">


            <table class="table table-striped table-hover ">
                <thead>
                <tr>

                    <th>Image</th>
                    <th>Title</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </tr>
                </thead>
                <tbody>

                @if($posts->count() >0)

                @foreach($posts as $post)
                    <tr>
                        <td><img width="90" height="50" src="{{$post->featured}}" alt="{{$post->title}}"></td>
                        <td>{{$post->title}}</td>
                        <td><a class="btn btn-xs btn-warning" href="{{route('post.edit',$post->id)}}">Edit</a></td>
                        <td><a class="btn btn-xs btn-danger" href="{{route('post.delete',$post->id)}}">Delete</a></td>
                    </tr>
                @endforeach


               @else

                <tr>
                    <th colspan="5" class="text-center">No Posts</th>
                </tr>



                @endif

                </tbody>
            </table>

        </div>

    </div>

@stop

@extends('layouts.app')


@section('content')

    <div class="panel panel-primary">
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

                @foreach($posts as $post)
                    <tr>
                        <td><img width="90" height="50" src="{{$post->featured}}" alt="{{$post->title}}"></td>
                        <td>{{$post->title}}</td>
                        <td><a class="btn btn-warning" href="">Edit</a></td>
                        <td><a class="btn btn-danger" href="">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

@stop

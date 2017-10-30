@extends('layouts.app')


@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Tags</h3>
        </div>


        <div class="panel-body">


            <table class="table table-striped table-hover ">
                <thead>
                <tr>

                    <th>Tag name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </tr>
                </thead>
                <tbody>

                @if($tags->count() >0)

                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td><a class="btn btn-xs btn-warning" href="{{route('tag.edit',$tag->id)}}">Edit</a></td>
                            <td><a class="btn btn-xs btn-danger" href="{{route('tag.delete',$tag->id)}}">Delete</a></td>
                        </tr>
                    @endforeach

                @else

                    <tr>
                        <th colspan="5" class="text-center">No Tags</th>
                    </tr>


                @endif
                </tbody>
            </table>

        </div>

    </div>

@stop

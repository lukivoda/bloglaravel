@extends('layouts.app')




@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Update '{{$tag->name}}'</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('tag.update',['id' =>$tag->id])}}" method="post" >

                {{csrf_field()}}

                <div class="form-group">

                    <label for="name">Name: </label>

                    <input type="text" name="name" value="{{$tag->name}}" class="form-control">

                </div>



                <div class="form-group">

                    <div class="text-center">

                        <button class="btn btn-primary" type="submit">

                            Update category

                        </button>

                    </div>



                </div>


            </form>
        </div>
    </div>


@stop
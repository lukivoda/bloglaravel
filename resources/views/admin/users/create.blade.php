@extends('layouts.app')




@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Add new user</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('user.store')}}" method="post" >

                {{csrf_field()}}

                <div class="form-group">

                    <label for="name">Name: </label>

                    <input type="text" name="name" class="form-control">

                </div>


                <div class="form-group">

                    <label for="name">Email: </label>

                    <input type="email" name="email" class="form-control">

                </div>



                <div class="form-group">

                    <div class="text-center">

                        <button class="btn btn-primary" type="submit">

                            Add user

                        </button>

                    </div>



                </div>


            </form>
        </div>
    </div>


@stop
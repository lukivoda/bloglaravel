@extends('layouts.app')




@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Edit profile </h3>
        </div>
        <div class="panel-body">
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group">

                    <img width="200" height="200" class='img-responsive img-rounded' src="{{$user->profile->avatar}}" alt="">

                </div>



                <div class="form-group">

                    <label for="name">Name: </label>

                    <input type="text" name="name" value="{{$user->name}}" class="form-control">

                </div>


                <div class="form-group">

                    <label for="name">Email: </label>

                    <input type="email" name="email" value="{{$user->email}}" class="form-control">

                </div>


                <div class="form-group">

                    <label for="password">Change password: </label>

                    <input type="password" name="password"  class="form-control">

                </div>


                <div class="form-group">

                    <label for="avatar">Upload avatar: </label>

                    <input type="file" name="avatar"  class="form-control">

                </div>

                <div class="form-group">

                    <label for="facebook">Facebook: </label>

                    <input type="text" name="facebook" value="{{$user->profile->facebook}}" class="form-control">

                </div>

                <div class="form-group">

                    <label for="youtube">Youtube: </label>

                    <input type="text" name="youtube" value="{{$user->profile->youtube}}" class="form-control">

                </div>


                <div class="form-group">

                    <label for="about">About: </label>

                    <textarea  class="form-control" name="about" id="about" cols="65" rows="15">  {{$user->profile->about}}  </textarea>

                </div>






                <div class="form-group">

                    <div class="text-center">

                        <button class="btn btn-primary" type="submit">

                            Edit Profile

                        </button>

                    </div>



                </div>


            </form>
        </div>
    </div>


@stop
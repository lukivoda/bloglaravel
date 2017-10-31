@extends('layouts.app')


@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Users</h3>
        </div>


        <div class="panel-body">


            <table class="table table-striped table-hover ">
                <thead>
                <tr>

                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Email</th>
                    <th>Permissions</th>
                    <th>Deleting</th>
                </tr>
                </thead>
                <tbody>

                @if($users->count() >0)

                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td><img width="60" height="60" src="{{$user->profile->avatar}}" alt="{{$user->name}}"></td>
                            <td>{{$user->email}}</td>
                            <td>
                               @if($user->admin)
                                    <a class="btn btn-danger btn-xs" href="{{route('user.not.admin',$user->id)}}">Remove permissions</a>
                          
                                @else

                                    <a class="btn btn-success btn-xs" href="{{route('user.make.admin',$user->id)}}">Make admin</a>
                                
                                
                                @endif

                            </td>
                            <td><a class="btn btn-xs btn-danger" href="">Delete</a></td>
                        </tr>
                    @endforeach

                @else

                    <tr>
                        <th colspan="5" class="text-center">No Users</th>
                    </tr>


                @endif
                </tbody>
            </table>

        </div>

    </div>

@stop

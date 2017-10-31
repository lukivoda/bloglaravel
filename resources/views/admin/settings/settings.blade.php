@extends('layouts.app')


@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Site settings</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('settings.update')}}" method="post" >

                {{csrf_field()}}



                <div class="form-group">

                    <label for="site_name">Site Name: </label>

                    <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">

                </div>

                <div class="form-group">

                    <label for="contact_number">Contact Number: </label>

                    <input type="text" name="contact_number" value="{{$settings->contact_number}}" class="form-control">

                </div>

                <div class="form-group">

                    <label for="contact_email">Contact Email: </label>

                    <input type="email" name="contact_email"  value="{{$settings->contact_email}}"class="form-control">

                </div>


                <div class="form-group">

                    <label for="address">Address: </label>

                    <input type="text" name="address"  value="{{$settings->address}}"class="form-control">

                </div>











                <div class="form-group">

                    <div class="text-center">

                        <button class="btn btn-primary" type="submit">

                            Edit settings

                        </button>

                    </div>



                </div>


            </form>
        </div>
    </div>


@stop



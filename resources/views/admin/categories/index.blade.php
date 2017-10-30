@extends('layouts.app')


@section('content')

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Categories</h3>
    </div>


    <div class="panel-body">


      <table class="table table-striped table-hover ">
      <thead>
        <tr>

          <th>Category name</th>
          <th>Editing</th>
          <th>Deleting</th>
        </tr>
      </thead>
      <tbody>

      @if($categories->count() >0)

      @foreach($categories as $category)
        <tr>
          <td>{{$category->name}}</td>
          <td><a class="btn btn-warning" href="{{route('category.edit',$category->id)}}">Edit</a></td>
          <td><a class="btn btn-danger" href="{{route('category.delete',$category->id)}}">Delete</a></td>
        </tr>
          @endforeach

      @else

        <tr>
          <th colspan="5" class="text-center">No Categories</th>
        </tr>


      @endif
      </tbody>
    </table>

    </div>

  </div>

@stop

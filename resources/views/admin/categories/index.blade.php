@extends('layouts.app')


@section('content')

  <div class="panel panel-primary">
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

      @foreach($categories as $category)
        <tr>
          <td>{{$category->name}}</td>
          <td><a class="btn btn-warning" href="{{route('category.edit',$category->id)}}">Edit</a></td>
          <td><a class="btn btn-danger" href="{{route('category.delete',$category->id)}}">Delete</a></td>
        </tr>
          @endforeach
      </tbody>
    </table>

    </div>

  </div>

@stop

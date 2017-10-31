@extends('layouts.app')


@section('styles')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
@stop

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Create new post</h3>
        </div>
        <div class="panel-body">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group">

                    <label for="title">Title: </label>

                    <input type="text" name="title" class="form-control">

                </div>

                <div class="form-group">

                    <label for="featured">Featured image</label>
                    
                    <input type="file" name="featured" class="form-control">

                </div>


                <div class="form-group">

                    <label for="category">Category</label>
                    <select class="form-control" name="category_id" id="category">
                       @foreach($categories as $category)
                        <option value="{{$category->id}}"  >{{$category->name}}</option>
                         @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="tags">Tags (use CTRL button)</label>
                    <select name="tags[]" multiple="" class="form-control">

                        @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                          @endforeach
                    </select>
                </div>


                <div class="form-group">

                    <label for="content">Content</label>

                    <textarea class="form-control" name="content" id="content" cols="5" rows="5"></textarea>

                </div>

                <div class="form-group">

                    <div class="text-center">

                       <button class="btn btn-primary" type="submit">

                           Store post

                       </button>

                    </div>



                </div>


            </form>
        </div>
    </div>


@stop

@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <script> $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@stop

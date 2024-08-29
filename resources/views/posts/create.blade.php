@extends('layouts.app')

@section('content')


<!-- <a href="{{url('posts/create')}}" class="btn btn-primary text-end mb-3">Add New Post</a>  -->


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


    <div class="card mb-4 col-md-9"  >
        <div class="card-header">            
        </div>
 
        <div class="card-body">
        <form action="{{url('posts')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="posttitle" required>               
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Subject</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="subject" required>               
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Content</label>
                <textarea id="summernote" name="contentdata"></textarea>
            </div>
             
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
             

        </div>

        <div class="card-footer">
            
        </div>
    </div>


    <script>
        $(document).ready(function() {
  $('#summernote').summernote();
});
    </script>
@endsection

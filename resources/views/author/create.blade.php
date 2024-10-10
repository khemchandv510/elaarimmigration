@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


<div class="card mb-4 col-md-12">
    <form action="" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card-header">Information</div>

        <div class="card-body">
            <div class="form-group">
                <label for="exampleFormControlInput1"> Author </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" required name="authorName" placeholder="name">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Image </label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="image">
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Footer Description</label>
            <textarea class="form-control editor1" name="footerdescription" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save </button>
    </form>
</div>


<script>
    CKEDITOR.replaceAll('editor1');
</script>

@endsection
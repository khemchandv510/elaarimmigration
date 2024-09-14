@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


<div class="card mb-4 col-md-12"> 
    <form action="" enctype="multipart/form-data" method="POST" test>
        @csrf
        <div class="card-header">Information</div>

        <div class="card-body">
             <input type="hidden" class="form-control" id="exampleFormControlInput1"  name="client_id" value="{{$clients->id}}" >

            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" required name="title" placeholder="name" value="{{$clients->title}}">
            </div>

            <div class="row">
                
                
                 
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Video Link </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="video_link" value="{{$clients->video_link}}" >
                </div>
                </div>

            <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleFormControlInput1">Choose image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1"  name="image" >
                </div>
            </div>

           

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Tag Description </label>
                    <textarea class="form-control" id="exampleFormControlInput1"  name="tagDescription" > {{$clients->tag_desc}} </textarea>
                </div>
            </div>


            </div>
        </div>
        

       

        <div class="form-group">
            <label for="exampleFormControlInput1">Footer Description</label>
            <textarea class="form-control editor1" name="footerdescription" rows="3"> {{$clients->content}} </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update </button>
    </form>
</div>

   
<script>
   CKEDITOR.replaceAll('editor1'); 
</script>


<script>
    
    

</script>
@endsection
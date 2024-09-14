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

            

            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                        <label for="exampleFormControlInput1">Category</label>
                        <select type="text" name="category" class="form-control" name="category_id" required>
                            @foreach($category as $categories)
                            <option value="{{$categories->id}}" {{ $categories->id == $home->category_id ? 'selected' : '' }} >{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->add_link}}"  name="add_link" >
                </div>
                </div>

            <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleFormControlInput1">First title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="first_title" value="{{$home->first_title}}" >
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleFormControlInput1">Second title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="second_title" value="{{$home->second_title}}" >
                </div>
            </div>

           

            </div>
        </div>
        

       

        <div class="form-group">
            <label for="exampleFormControlInput1"> Description</label>
            <textarea class="form-control editor1" name="description" rows="3"> {{$home->content}}</textarea>
        </div>
        
        
        <div class="row">
                
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->custom_name1}}"  name="custom_name1" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->url1}}"  name="url1" >
                </div>
                </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->custom_name2}}" name="custom_name2" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->url2}}" name="url2" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->custom_name3}}" name="custom_name3" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->url3}}" name="url3" >
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->custom_name4}}" name="custom_name4" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$home->url4}}"  name="url4" >
                </div>
                </div>

           

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
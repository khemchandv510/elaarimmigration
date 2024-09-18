@extends('layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-8">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Facebook url</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="facebook" value="{{$Socialmedia->facebook}}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Twitter Url</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="twitter" value="{{$Socialmedia->twitter}}">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Instagram  Url</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="instagram" value="{{$Socialmedia->instagram}}">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Linkedin Url</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="lindedin" value="{{$Socialmedia->linkdin}}">
  </div>


  <div class="form-group">
    <label for="exampleInputPassword1">Youtube  Url</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="youtube" value="{{$Socialmedia->youtube}}">
  </div>
  

  <div class="form-group">
    <label for="exampleInputPassword1">Pinterest  Url</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="pinterest" value="{{$Socialmedia->pinterest}}">
  </div>
  
  <button type="submit" class="btn btn-primary">update</button>
</form>
        </div>
        
    </div>
</section>

@endsection

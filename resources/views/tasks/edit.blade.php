@extends('layouts.app')

@section('content')



@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


    <div class="card mb-4 col-md-9"  >
        <div class="card-header">            
        </div>
 
        <div class="card-body">
            <form action="{{url('task', $post->id)}}" method="post">
            @csrf
            {{ method_field('PUT') }}
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="posttitle" value="{{$post->title}}" required>               
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->description}}" name="contentdata" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Status</label> </br>
            <div class="btn-group " role="group" aria-label="Basic radio toggle button group">
  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" value="pending" autocomplete="off" @if($post->status == 'pending') checked  @endif>
  <label class="btn btn-outline-primary" for="btnradio1">Pending</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" value="completed" autocomplete="off" @if($post->status == 'completed') checked  @endif>
  <label class="btn btn-outline-primary" for="btnradio2">completed</label>
 
</div>

</div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Due Date *</label>
                <input type="date" class="form-control" name="due_date" id="txtDate" aria-describedby="emailHelp" value="{{$post->due_date}}" required>               
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
             

        </div>

        <div class="card-footer">
            
        </div>
    </div>


    <script>
    

$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var minDate= year + '-' + month + '-' + day;

    $('#txtDate').attr('min', minDate);
});
    </script>
@endsection

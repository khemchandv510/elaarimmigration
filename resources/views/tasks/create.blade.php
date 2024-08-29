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
        <form action="{{url('emails')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name *</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" required>               
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">email id *</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
            </div>

      

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
             

        </div>

        <div class="card-footer">
            
        </div>
    </div>


    <script>
//         $(document).ready(function() {
//   $('#summernote').summernote();
// });


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

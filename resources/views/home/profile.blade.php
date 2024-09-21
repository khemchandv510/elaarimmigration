@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif

<div class="card mb-4 col-md-12">
    <form action="" enctype="multipart/form-data" method="post">
        @csrf
        <div class="card-header">Information</div>
        <div class="card-body">

            <div class="form-group">
                <label for="exampleFormControlInput1">Logo</label>
                <input type="file" class="form-control" id="exampleFormControlInput1" name="image" placeholder="name">
                <img  width="150px" src="{{ asset('/public/images') }}/{{$company->logo}}">
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Company name </label>
                        <input type="text" class="form-control"  name="name" placeholder="name" value="{{$company->name}}">

                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Company Email </label>
                        <input type="email" class="form-control"  name="email" placeholder="email"  value="{{$company->email}}">

                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Company Mobile </label>
                        <input type="text" class="form-control"  name="mobile" value="" placeholder="mobile"  value="{{$company->mobile}}">
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Country  </label>
                        <input type="text"   class="form-control"  name="country"  value="{{$company->country}}">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address 1  </label>
                        <textarea  class="form-control"  name="address1"  >  {{$company->address1}} </textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address 2  </label>
                        <textarea  class="form-control"  name="address2" > {{$company->address2}} </textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address 3  </label>
                        <textarea  class="form-control"  name="address3" > {{$company->address3}} </textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Address 4  </label>
                        <textarea  class="form-control"  name="address4" > {{$company->address4}} </textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Copyright  status  </label>
                        <textarea  class="form-control"  name="copyright" >  {{$company->copyright}} </textarea>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label >Company certificate </label>
                        <textarea type="file" class="form-control"  name="certificate" > {{$company->certificates}} </textarea>
                    </div>
                </div>


            </div>
        </div>
        
       
         <!-- page content -->
        


     
        <!-- seo information -->
        <div class="card bg-light mb-3">
            <div class="card-header">Seo</div>
            <div class="card-body">
               
                <!-- <div class="form-group">
                    <label for="exampleFormControlInput1">SEO url</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="seourl" value="" >
                </div> -->

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Head tag</label>
                    <textarea class="form-control" name="scripthead" id="exampleFormControlTextarea1" rows="3">  {{$company->headtag}} </textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Body tag</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="scriptBody" rows="3"> {{$company->bodytag}} </textarea>
                </div>
            </div>
        </div>

      

        <button type="submit" class="btn btn-primary">update</button>

        @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                        @endforeach
                    </div>
                @endif

                @if(\Session::has('error'))
                    <div>
                        <li class="alert alert-danger">{!! \Session::get('error') !!}</li>
                    </div>
                @endif

                @if(\Session::has('success'))
                    <div>
                        <li class="alert alert-success">{!! \Session::get('success') !!}</li>
                    </div>
                @endif
    </form>
</div>





<script>
   CKEDITOR.replaceAll('editor1'); 
</script>


<script>
    
   
</script>
@endsection
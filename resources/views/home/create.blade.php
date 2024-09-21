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
                <label for="exampleFormControlInput1">Page Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1"  required name="pageName" placeholder="name">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Destop Image </label>
                        <input type="file" class="form-control"  name="destopImage" placeholder="name">

                     <!-- <img  width="150px"> -->

                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Mobile Image </label>
                        <input type="file" class="form-control"  name="mobileIMage" placeholder="name">

                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Banner Title </label>
                        <input type="text" class="form-control"  name="bannerTitle" value="" placeholder="name">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Banner Url  </label>
                        <input type="text" class="form-control"  name="bannerUrl" >
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Description </label>
                        <textarea type="file" class="form-control"  name="description" >  </textarea>
                    </div>
                </div>


            </div>
        </div>
        
       
         <!-- page content -->
        
        
        <!-- faq -->
        <div class="card bg-light mb-3">
            <div class="card-header">Faq</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="faqtitle" placeholder="">
                </div>


               

            </div>
        </div>





         



     
        <!-- seo information -->
        <div class="card bg-light mb-3">
            <div class="card-header">Seo</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Meta Tag</label>
                    <input type="text" name="metatag" class="form-control" id="exampleFormControlInput1" >
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Meta tag description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="metadescription" rows="3"> </textarea>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Meta tag keywords</label>
                            <textarea class="form-control" name="metakeywords" id="exampleFormControlTextarea1" rows="3"> </textarea>
                        </div>
                    </div>
                </div> <!-- Closing the .row div here -->

                <div class="form-group">
                    <label for="exampleFormControlInput1">SEO url</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="seourl" value="" >
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Head tag</label>
                    <textarea class="form-control" name="scripthead" id="exampleFormControlTextarea1" rows="3"> </textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Body tag</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="scriptBody" rows="3"> </textarea>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Footer Description</label>
            <textarea class="form-control editor1" name="footerdescription" rows="3"> </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save & next</button>
    </form>

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
</div>





<script>
   CKEDITOR.replaceAll('editor1'); 
</script>


<script>
    
   
</script>
@endsection
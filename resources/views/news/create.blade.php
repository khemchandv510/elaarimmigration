@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


<div class="card mb-4 col-md-12">
    <form action="{{route('news.store')}}" enctype="multipart/form-data" method="POST" test>
        @csrf
        <div class="card-header">Information</div>

        <div class="card-body">

            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" required name="pageName" placeholder="name">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Add Category</label>
                        <select  name="category[]" class="form-control js-example-basic-multiple" multiple="multiple" required>
                            <option value="">None</option>
                            @foreach($allItems as $categories)
                            <option value="{{$categories->name}}">{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                

                <div class="col-md-6">
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Choose image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1"  name="image" >
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Author Name</label>
                    
                    <select name="authorName" id="" class="form-control" required>
                        <option value="">Select</option> 
                        @foreach($author as $categories)
                            <option value="{{$categories->name}}">{{$categories->name}}</option>
                            @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Slug</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="slug" placeholder="slug">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Published Date</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1"  name="date" placeholder="name">
                </div>
            </div>

                     <!-- seo information -->
        <div class="card bg-light mb-3">
            <div class="card-header">Seo</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Meta Tag</label>
                    <input type="text" name="metatag" class="form-control" id="exampleFormControlInput1" value="" placeholder="name">
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
                            <textarea class="form-control" name="metakeywords" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                </div> <!-- Closing the .row div here -->

                <div class="form-group">
                    <label for="exampleFormControlInput1">SEO url</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" name="seourl" placeholder="" value="">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Head tag</label>
                    <textarea class="form-control" name="scripthead" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Dynamic Script for Body tag</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="scriptBody" rows="3"> </textarea>
                </div>
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


<script>
    
    function getsubcategroy(id){

        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/sub-categories/"+id,
            data: {
                id: 'Fred',
                lastName: 'Flintstone'
            }
        }).then(function (response) {
            // console.log(response.data.data);

            var html=''
               html = '<option value=""> None </option>'
               response.data.data.forEach(category => {
                    html += ` <option value="${category.id}"> ${category.name } </option>`
               });

               document.getElementById('subcategory').innerHTML = html;
              
        });            
    }

    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });

    // function getsubsubcategroy(id){/
    //     let catid = document.getElementById("subcategory").value;
    //     console.log(catid);
        
    //     axios({
    //         method: 'get',
    //         url: "{{ env('APP_URL') }}/api/sub-sub-category/"+id,
    //         data: {
    //             id: id
                
    //         }
    //     }).then(function (response) {
    //         console.log(response.data.data);

    //         var html=''
    //            html = '<option value=""> None </option>'
    //            response.data.data.forEach(category => {
    //                 html += ` <option value="${category.id}"> ${category.name } </option>`
    //            });

    //            document.getElementById('subSubcategory').innerHTML = html;
              
    //     });
    // }

</script>
@endsection
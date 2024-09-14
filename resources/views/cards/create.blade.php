@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


<div class="card mb-4 col-md-12">
    <form action="{{route('card.store')}}" enctype="multipart/form-data" method="POST" >
        @csrf
        <div class="card-header">Information</div>

        <div class="card-body">

            

            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                        <label for="exampleFormControlInput1">Category</label>
                        <select type="text" name="category" class="form-control" name="category_id" required>
                            <option value="">None</option>
                            @foreach($category as $categories)
                            <option value="{{$categories->id}}">{{$categories->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="add_link" >
                </div>
                </div>

            <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleFormControlInput1">First title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="first_title" >
                </div>
            </div>
            <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleFormControlInput1">Second title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="second_title" >
                </div>
            </div>

           

            </div>
        </div>
        

       

        <div class="form-group">
            <label for="exampleFormControlInput1"> Description</label>
            <textarea class="form-control editor1" name="description" rows="3"></textarea>
        </div>
        
        
        <div class="row">
                
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="custom_name1" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="url1" >
                </div>
                </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="custom_name2" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="url2" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="custom_name3" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="url3" >
                </div>
                </div>
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Custom category name </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="custom_name4" >
                </div>
                </div>
                
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Url </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="url4" >
                </div>
                </div>

           

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

    function getsubsubcategroy(id){
        let catid = document.getElementById("subcategory").value;
        console.log(catid);
        
        axios({
            method: 'get',
            url: "{{ env('APP_URL') }}/api/sub-sub-category/"+id,
            data: {
                id: id
                
            }
        }).then(function (response) {
            console.log(response.data.data);

            var html=''
               html = '<option value=""> None </option>'
               response.data.data.forEach(category => {
                    html += ` <option value="${category.id}"> ${category.name } </option>`
               });

               document.getElementById('subSubcategory').innerHTML = html;
              
        });
    }

</script>
@endsection
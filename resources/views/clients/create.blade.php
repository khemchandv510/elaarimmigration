@extends('layouts.app')

@section('content')

@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif


<div class="card mb-4 col-md-12">
    <form action="{{route('clients.store')}}" enctype="multipart/form-data" method="POST" test>
        @csrf
        <div class="card-header">Information</div>

        <div class="card-body">

            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" required name="title" placeholder="name">
            </div>

            <div class="row">
                
                <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Add Video Link </label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  name="video_link" >
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
                    <textarea class="form-control" id="exampleFormControlInput1"  name="tagDescription" > </textarea>
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
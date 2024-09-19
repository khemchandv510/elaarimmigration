@extends('layouts.app')

@section('content')

<section class="content">
<div class="row">
        
        <div class="col-md-7">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Category</h3>
                </div>
                
                <form action="" role="form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category name" value="{{ $subSubCategories->name }}" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category Image*</label>
                                    <input type="file" name="image" id="">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Show Navigation *</label>                                    
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="navi" id="exampleRadios1" value="1"   @if($subSubCategories->navi == 1) checked @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            True
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="navi" id="exampleRadios2" value="0"  @if($subSubCategories->navi == 0) checked @endif>
                                        <label class="form-check-label" for="exampleRadios2">
                                            False
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Select parent category*</label>
                                    <select type="text" name="parent_id" class="form-control" onchange="getsubcategroy(this.value)" required>
                                            <option value="">None</option>
                                            @if($categories)
                                            @foreach($categories as $category)
                                                <?php $dash=''; ?>
                                                <option value="{{$category->id}}" {{ $category->id == $subSubCategories->category_id ? 'selected' : '' }} >{{$category->name}}</option>
                                                @if(count($category->subcategory))     
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Select Sub category*</label>
                                    <select type="text" id="subcategory" name="subcategory" class="form-control" >
                                    <option value="">None</option>
                                            @foreach($subcategories as $category)
                                                <?php $dash=''; ?>
                                                <option value="{{$category->id}}" {{ $category->id == $subSubCategories->sub_category_id ? 'selected' : '' }} >{{$category->name}}</option>
                                               
                                            @endforeach
                                        
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>

                    </div>
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
        </div>
    </div>
</section>
<script>
   CKEDITOR.replaceAll('editor1');

   function getsubcategroy(id){

            axios({
                method: 'get',
                url: "{{ env('APP_URL') }}/sub-categories/"+id,
                data: {
                    id: 'Fred',
                    lastName: 'Flintstone'
                }
            }).then(function (response) {
                console.log(response.data.data);

                var html=''
                html = '<option value=""> None </option>'
                response.data.data.forEach(category => {
                        html += ` <option value="${category.id}"> ${category.name } </option>`
                });

                document.getElementById('subcategory').innerHTML = html;
                
            });        
    }

</script>

<script>
new DataTable('#newdatatable');

function getsubcategroy(id){

axios({
    method: 'get',
    url: "{{ env('APP_URL') }}/sub-categories/"+id,
    data: {
        id: 'Fred',
        lastName: 'Flintstone'
    }
}).then(function (response) {
    console.log(response.data.data);

    var html=''
    html = '<option value=""> None </option>'
    response.data.data.forEach(category => {
            html += ` <option value="${category.id}"> ${category.name } </option>`
    });

    document.getElementById('subcategory').innerHTML = html;
    
});        
}
</script>
@endsection

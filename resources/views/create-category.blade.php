@extends('layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped" id="newdatatable">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Navi</th>
                    <th scope="col">Position </th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                
                @php
                        $count = 0;
                    @endphp

                @if($categories)
                    @foreach($categories as $category)
                    @php $count++; @endphp

                        <tr>
                        <th scope="row">{{$count }}</th>
                        <td>{{$category->name }}</td>
                            <td> @if($category->image)
                                <img src="{{ asset('/public/images') }}/{{$category->image}}" width="100px">
                                @endif
                            </td>
                            <td>@if($category->navi == 0)  False @else True @endif </td>
                            <td>{{$category->position }}</td>
                            <td><a href="{{route('category.detail', $category->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                            <a href="{{route('category.delete', $category->id)}}"> <i class="fa fa-trash" aria-hidden="true"></i>  </a>
                            

                            </td>
                        
                        </tr>
                    @endforeach
                @endif
                    
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Category</h3>
                </div>
                
                <form role="form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category name" value="{{old('name')}}" required />
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
                                        <input class="form-check-input" type="radio" name="navi" id="exampleRadios1" value="1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            True
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="navi" id="exampleRadios2" value="0">
                                        <label class="form-check-label" for="exampleRadios2">
                                            False
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>position </label>
                                    <input type="number" name="position" class="form-control" placeholder="Category position"   />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Slug </label>
                                    <input type="text" name="slug" class="form-control" placeholder="Category Slug"  required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Color code </label>
                                    <input type="text" name="color" class="form-control" placeholder=" color code"   />
                                </div>
                            </div>

                            <!-- <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Select parent category*</label>
                                    <select type="text" name="parent_id" class="form-control">
                                        <option value="">None</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                <?php $dash=''; ?>
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @if(count($category->subcategory))     
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div> -->

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
new DataTable('#newdatatable');
</script>
@endsection

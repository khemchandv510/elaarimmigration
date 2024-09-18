@extends('layouts.app')

@section('content')

<section class="content">
    <div class="box-header with-border">
    </div>
    <div class="row">
     
        <div class="col-md-4">
            <div class="box box-primary">
            <div class="box-header with-border">
                    <h4 class="box-title">Edit Category</h4>
                </div>
                <form action="" role="form" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Category name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Category name" value="{{ $subCategories->name }}" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                            @if($subCategories->image)
                                <img src="{{ asset('/public/images') }}/{{$subCategories->image}}" width="250px">
                                @endif
                                <div class="form-group">
                                    <label>Category Image*</label>
                                    <input type="file" name="image" id="">
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    
                                    <label>Show Navigation *</label>                                    
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="navi" id="exampleRadios1" value="1"   @if($subCategories->navi == 1) checked @endif>
                                        <label class="form-check-label" for="exampleRadios1">
                                            True
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="navi" id="exampleRadios2" value="0"  @if($subCategories->navi == 0) checked @endif>
                                        <label class="form-check-label" for="exampleRadios2">
                                            False
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Select parent category*</label>
                                    <select type="text" name="parent_id" class="form-control" required>
                                        <option value="">None</option>
                                        @if($categories)
                                            @foreach($categories as $category)
                                                <?php $dash=''; ?>
                                                <option value="{{$category->id}}" {{ $category->id == $subCategories->category_id ? 'selected' : '' }} >{{$category->name}}</option>
                                                @if(count($category->subcategory))     
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>

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
@endsection

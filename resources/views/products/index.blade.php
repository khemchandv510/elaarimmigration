@extends('layouts.app')

@section('content')

<section class="content">
    <div class="col-md-4">
        <a href="{{route('product.add')}}"> <button type="button" class="btn btn-primary w-100"  >  Add new Product</button></a>
    </div>
    <div class="row">
       
        <div class="col-md-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                 
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                
                
                @if($products)
                    @foreach($products as $category)
                        <tr>
                            <th scope="row">{{$category->id }}</th>
                            <td>{{$category->name }}</td>
                            <td> @if($category->image)
                                <img src="{{ asset('/public/images') }}/{{$category->image}}" width="100px">
                                @endif
                            </td>
                            <td><a href="{{route('product.detail', $category->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> 

                            <a href="{{route('product.delete', $category->id )}}"> <i class="fa fa-trash" aria-hidden="true"></i>  </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                    
                </tbody>
            </table>
                
                
               
        </div>
    </div>
</section>
@endsection

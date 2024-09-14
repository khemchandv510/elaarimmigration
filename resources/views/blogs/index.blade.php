@extends('layouts.app')

@section('content')

<section class="content">
<div class="row">
<a href="{{route('blog.create')}}"> <button type="button" class="btn btn-primary w-10"  >  Add new Blog</button></a>
    <div class="col-md-8">
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Category name</th>
                <th scope="col">Author name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
             <tbody>
             
                    @php
                        $count = 0;
                    @endphp
                    @foreach($blogs as $category)
                           @php $count++; @endphp
                        <tr>
                            <th scope="row">{{$count }}</th>
                            <td>{{$category->title }}</td>
                             <td>{{@$category->mainCategory->name }}</td>
                            
                            <td> @if($category->image)
                                <img src="{{ asset('/public/images') }}/{{$category->image}}" width="100px">
                                @endif
                            </td>
                            <td><a href="{{route('blog.edit', $category->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                            
                             <a href="{{route('blog.delete', $category->id )}}"> <i class="fa fa-trash" aria-hidden="true"></i>  </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            
            
        </table>
    </div>
</div>
</section>


@endsection

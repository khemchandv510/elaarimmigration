@extends('layouts.app')

@section('content')

<section class="content">
<div class="row">
<a href="{{route('home.create')}}"> <button type="button" class="btn btn-primary w-10"  >  Add new Page </button></a>
    <div class="col-md-12">
        <table class="table table-striped"  id="newdatatable"> 
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
             <tbody>
             
                    @php
                        $count = 0;
                    @endphp
                    @foreach($home as $category)
                           @php $count++; @endphp
                        <tr>
                            <th scope="row">{{$count }}</th>
                            <td>{{$category->page_name }}</td>
                            
                            
                            <td>
                                <a href="{{route('home.edit', $category->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                            
                             <!-- <a href="{{route('blog.delete', $category->id )}}"> <i class="fa fa-trash" aria-hidden="true"></i>  </a> -->
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            
            
        </table>
    </div>
</div>
</section>

<script>
new DataTable('#newdatatable');
</script>

@endsection

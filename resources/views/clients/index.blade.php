@extends('layouts.app')

@section('content')

<section class="content">
<div class="row">
<a href="{{route('clients.create')}}"> <button type="button" class="btn btn-primary w-10"  >  Add new Clients </button></a>
    <div class="col-md-8">
        <table class="table table-striped" id="newdatatable">
            <thead>
                <tr>
                <th scope="col">id</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Link </th>
                <th scope="col">Action</th>
                </tr>
            </thead>
             <tbody>
             
                    @php
                        $count = 0;
                    @endphp
                    @foreach($clients as $category)
                           @php $count++; @endphp
                        <tr>
                            <th scope="row">{{$count }}</th>
                            <td> @if($category->image)
                                <img src="{{ asset('/public/images') }}/{{$category->image}}" width="100px">
                                @endif
                            </td>                            
                            <td>{{$category->title }}</td>
                            <td>{{@$category->video_link }}</td>
                           
                            <td><a href="{{route('clients.edit', $category->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                            
                             <a href="{{route('clients.delete', $category->id )}}"> <i class="fa fa-trash" aria-hidden="true"></i>  </a>
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

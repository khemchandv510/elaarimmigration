@extends('layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <a href="{{route('author.create')}}"> <button type="button" class="btn btn-primary w-10"> Add new Author </button></a>
        <div class="col-md-8">
            <table class="table table-striped" id="newdatatable">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image </th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $count = 0;
                    @endphp
                    @foreach($author as $category)
                    @php $count++; @endphp
                    <tr>
                        <th scope="row">{{$count }}</th>
                        <td>{{$category->name }}</td>
                        <td> @if($category->image)
                            <img src="{{ asset('/public/images') }}/{{$category->image}}" width="100px">
                            @endif
                        </td>

                        <td>    
                            <a href="#"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
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
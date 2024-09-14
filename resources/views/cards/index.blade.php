@extends('layouts.app')

@section('content')

<section class="content">
<div class="row">
<a href="{{route('card.add')}}"> <button type="button" class="btn btn-primary w-10"  >  Add new Card </button></a>
    <div class="col-md-8">
        <table class="table table-striped">
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
                     
                     @foreach($cards as $category)
                           @php $count++; @endphp
                        <tr>
                            <th scope="row">{{$count }}</th>
                                                   
                            <td>{{$category->first_title }}</td>

                            <td><a href="{{route('card.edit', $category->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a> 
                            
                             <a href="{{route('card.delete', $category->id )}}"> <i class="fa fa-trash" aria-hidden="true"></i>  </a>
                            </td>
                        </tr>
                    @endforeach
                    
                    

                </tbody>
            
            
        </table>
    </div>
</div>
</section>


@endsection

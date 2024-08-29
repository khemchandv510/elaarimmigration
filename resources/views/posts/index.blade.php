@extends('layouts.app')

@section('content')


<a href="{{url('posts/create')}}" class="btn btn-primary text-end mb-3">Add New Template</a> 
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Posts') }}
        </div>

        

        <div class="card-body">

            <table class="table">
                <thead>
                <tr> 
                    <th scope="col">S no.</th>
                    <th scope="col">Name</th>
                    <th scope="col">subject</th>
                    <th scope="col">Edit</th>
                </tr>
                </thead>
                <tbody>
                    @php $count = 0; @endphp
                @foreach($posts as $user)
                @php $count++; @endphp
                    <tr>
                        <td>{{$count }} </td>
                        <td>{{ $user->template_name }}</td>
                        <td>{{ $user->subject }}</td>
                   
                        <td> <a href="posts/{{$user->id}}/edit" class="btn-primary btn">Edit Template</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="card-footer">
            {{ $posts->links() }}
        </div>
    </div>
@endsection

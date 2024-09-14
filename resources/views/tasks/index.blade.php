@extends('layouts.app')

@section('content')


<a href="{{url('emails/create')}}" class="btn btn-primary text-end mb-3">Add New Email</a> 
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
    <div class="card mb-4">
        <div class="card-header">
            {{ __('emails') }}
        </div>

        

        <div class="card-body">

            <table class="table">
                <thead>
                <tr> 
                    <th scope="col">S no.</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">Group code</th>
                    <th scope="col">status</th>
                    <th scope="col"> Date</th>
                    <th scope="col">Delete</th>
                  
                </tr>
                </thead>
                <tbody>
                    @php $count = 0; @endphp
                @foreach($posts as $user)
                @php $count++; @endphp
                    <tr>
                        <td>{{$user->id }} </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                         <td>{{ $user->group_id }}</td>
                        <td>{{ $user->status }}</td>
                        <td>{{ $user->date }}</td>
                        <td>
                            
                        <form action="{{ url('emails', ['categorie_name' => $user->id]) }}" method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn-danger btn">Delete</button>
                        </form>

                        </td> 
                       
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

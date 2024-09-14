@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">
       
        <table class="table table-striped">
                <thead>
                <tr> 
                    <th scope="col">S no.</th>
                    <th scope="col">Host name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Setfrom </th>
                    <th scope="col">Reply to</th>
                    <th scope="col">status</th>
                    <th scope="col">limit</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($smtpconfig as $groups)
                    <tr>
                        <td>{{$groups->id }} </td>
                        <td>{{ $groups->host }}</td>
                        <td>{{ $groups->Username }}</td>
                        <td>{{ $groups->setFrom }}</td>
                        <td>{{ $groups->replyto }}</td>
                        <td>{{ $groups->status }}</td>
                        <td> {{ $groups->elimit}}  </td>
                        <td>   <button class="btn-primary btn">Make primary</button> </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

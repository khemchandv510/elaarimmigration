@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">
       


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">     Add New  </button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Email Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('email.group-submit')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Group Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="groupname" aria-describedby="emailHelp" placeholder="Enter group name">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        <table class="table">
                <thead>
                <tr> 
                    <th scope="col">S no.</th>
                    <th scope="col">Unique no.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($emailGroups as $groups)
                    <tr>
                        <td>{{$groups->id }} </td>
                        <td>{{ $groups->unique_id }}</td>
                        <td>{{ $groups->name }}</td>
                        <td>{{ $groups->status }}</td>
                        <td>{{ $groups->created_at }}</td>
                        <td>   </td> 
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

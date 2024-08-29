@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Dashboard') }}
        </div>
        <div class="card-body">

        @if ($message = Session::get('success'))
        <div class="alert alert-success  alert-dismissible">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    
    @if ($message = Session::get('error'))
        <div class="alert alert-danger  alert-dismissible">
            <strong>{{ $message }}</strong>
        </div>
    @endif
            <form method="post" action="{{ route('send-test-email') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Recipient Email:</label>
                <input type="email" name="email" class="form-control" />
            </div>

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="senderName" class="form-control" />
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Select Template</label>
                <select name="template_id" class="form-control" id="exampleFormControlSelect1" required>
                    <option value="">Select</option>
                       
                    @foreach($emailTemplate as $date)
                    <option value="{{$date->id}}">{{$date->template_name}}</option>
                    @endforeach
               
                </select>
            </div>
            
            <div class="form-group mt-3 mb-3">
                <button type="submit" class="btn btn-success btn-block">Send Email</button>
            </div>
        </form>
        </div>
    </div>

@endsection

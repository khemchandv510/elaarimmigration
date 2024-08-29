@extends('layouts.app')

@section('content')


@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
    <div class="card mb-4">
        
        <form action="{{ route('importdata') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-4">
                <div class="custom-file text-left">
                    <input required type="file" name="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
             <button class="btn btn-primary">Import emails</button>
          
        </form>
    </div>
@endsection

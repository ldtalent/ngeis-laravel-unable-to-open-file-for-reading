@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div class="row">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{$error}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection

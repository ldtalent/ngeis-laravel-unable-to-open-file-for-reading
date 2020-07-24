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
            <div class="col-md-6">
                <form method="post" action="{{url('attachment/add')}}" class="form-horizontal" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            @csrf
                            @method('post')
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" class="form-control" id="subject">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" cols="7" class="form-control"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="attachment">Attachment</label>
                                <input type="file" name="image" id="attachment" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="submit" class="btn btn-success" >
                            <i class="fa fa-plus"></i>Send Attachment
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

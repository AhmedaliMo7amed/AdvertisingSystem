@extends('Layouts.navbar')
<div class="bg-light p-5 rounded">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-1 margin-tb">
                <a class="btn btn-primary" href="{{ route('category.index') }}">Back</a>
            </div>
            <div class="col-lg-9 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Category  #ID {{ $data->id }}</h2>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mb-1 mt-1">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('advertiser.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>Name</strong>
                        <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Advertiser Name">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="text" name="email" value="{{ $data->email }}" class="form-control" placeholder="Advertiser Email">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>Phone</strong>
                        <input type="text" name="phone" value="{{ $data->phone }}" class="form-control" placeholder="Advertiser Phone">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary ml-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

@extends('Layouts.navbar')

<div class="bg-light p-5 rounded">

    <div class="mt-2">
        <div class="row">
            <div class="col-lg-6 margin-tb">
                <div class="pull-left">
                    <h2>List Of Ads</h2>
                    <a class="btn btn-success mb-1" href="{{route('ads.create')}}">Add New</a>
                </div>
            </div>
            <div class="col-lg-3 margin-tb">
                <div class="pull-left">
                    <h2>Filter By</h2>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                            <form action="{{ route('filter.category') }}" method="get">
                                <div class="form-group">
                                    <strong>Category</strong>
                                    <select name="id" class="form-select" aria-label="Default select example">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mt-1 p-1"><button type="submit" class="btn btn-primary">Search</button></div>
                            </form>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                            <form action="{{ route('filter.tag') }}" method="get">
                                <div class="form-group">
                                    <strong>Tag</strong>
                                    <select name="id" class="form-select" aria-label="Default select example">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">
                                                {{$tag->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mt-1 p-1"><button type="submit" class="btn btn-primary">Search</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Advertiser</th>
                <th>Category</th>
                <th>Type</th>
                <th>Title</th>
                <th>Description</th>
                <th>Start date</th>
                <th width="230px">Action</th>
            </tr>
            @foreach ($data as $element )
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->advertiser->name }}</td>
                    <td>{{ $element->category->name }}</td>
                    <td>{{ $element->type }}</td>
                    <td>{{ $element->title }}</td>
                    <td>{{ $element->description }}</td>
                    <td>{{ $element->start_date }}</td>
                    <td>
                        <form action="{{ route('ads.delete',$element->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('ads.edit',$element->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

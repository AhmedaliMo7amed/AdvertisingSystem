@include('Layouts.navbar')

<div class="bg-light p-5 rounded">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-1 margin-tb">
                <a class="btn btn-primary" href="{{ route('ads.index') }}">Back</a>
            </div>
            <div class="col-lg-9 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Ad  #ID {{ $ad->id }}</h2>
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
        <form action="{{ route('ads.update',$ad->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>Advertiser</strong>
                        <select name="advertiser_id"  class="form-select" aria-label="Default select example">
                            @foreach($advertisers as $advertiser)
                                <option value="{{$advertiser->id}}" {{ $advertiser->id == $ad->advertiser_id ? 'selected="selected"' : '' }}>
                                    #{{$advertiser->id}} {{$advertiser->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>Category</strong>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{ $category->id == $ad->category_id ? 'selected="selected"' : '' }}>
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>type</strong>
                        <select class="form-select" aria-label="Default select example">
                                <option value="free" {{ $ad->type == 'free' ? 'selected="selected"' : '' }}>free</option>
                                <option value="paid" {{ $ad->type == 'paid'? 'selected="selected"' : '' }}>paid</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>tite</strong>
                        <input type="text" name="title" value="{{ $ad->title }}" class="form-control" placeholder="Title">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>Description</strong>
                        <input type="text" name="description" value="{{ $ad->description }}" class="form-control" placeholder="Description">
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 mt-3 mb-3">
                    <div class="form-group">
                        <strong>Start Date</strong>
                        <input id="datePicker" type="date" name="start_date" value="{{ $ad->start_date }}" dataformatas="YYYY-MM-DD" class="form-control" placeholder="Start Date">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-3 mb-3">
                    <div class="row">
                    <strong>Tags</strong>
                    @foreach($tags as $tag)
                            <div class="col-3 form-check">
                                <input name="tags[]" class="form-check-input" type="checkbox" value="{{$tag->id}}" id="flexCheckDefault" @foreach($ad->tags as $element) {{ $tag->id == $element->id ? 'checked="checked"' : '' }} @endforeach>
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$tag->name}}
                                </label>

                            </div>
                        @endforeach
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



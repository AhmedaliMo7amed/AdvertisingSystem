@include('Layouts.navbar')
<div class="bg-light p-5 rounded">

    <div class="mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>List Of Tags</h2>
                    <a class="btn btn-success mb-1" href="{{route('tags.create')}}">Add New</a>
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
                <th>name</th>
                <th>slug</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($data as $element )
                <tr>
                    <td>{{ $element->id }}</td>
                    <td>{{ $element->name }}</td>
                    <td>{{ $element->slug }}</td>
                    <td>
                        <form action="{{ route('tags.delete',$element->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('tags.edit',$element->id) }}">Edit</a>
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

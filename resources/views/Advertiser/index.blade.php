@include('Layouts.navbar')

<div class="bg-light p-5 rounded">

    <div class="mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>List Of Advertisers</h2>
                    <a class="btn btn-success mb-1" href="{{route('advertiser.create')}}">Add New</a>
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
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th width="280px">Action</th>
            </tr>
                            @foreach ($data as $element )
                                <tr>
                                    <td>{{ $element->id }}</td>
                                    <td>{{ $element->name }}</td>
                                    <td>{{ $element->email }}</td>
                                    <td>{{ $element->phone }}</td>
                                    <td>
                                        <form action="{{ route('advertiser.delete',$element->id) }}" method="Post">
                                            <a class="btn btn-success" href="{{ route('advertiser.ads',$element->id) }}">Ads</a>
                                            <a class="btn btn-primary" href="{{ route('advertiser.edit',$element->id) }}">Edit</a>
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

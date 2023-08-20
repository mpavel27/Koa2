@extends('admin.app')
@section('main-container')
    <h1 class="h3 mb-3"><strong>Manage</strong> News</h1>
    <div class="bg-white p-4 rounded-3 shadow">
        <table class="table table-bordered table-striped m-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($news as $new)
                <tr>
                    <th scope="row">{{ $new->id }}</th>
                    <td>{{ $new->title }}</td>
                    <td>{{ app('App\Http\Controllers\MainController')->getUsernameById($new->created_by) }}</td>
                    <td>{{ $new->created_at }}</td>
                    <td>{{ $new->updated_at }}</td>
                    <td class="d-flex gap-2">
                        <a href="{{ route('app.admin.news.manage', $new->id) }}" class="btn btn-primary">Manage</a>
                        <form action="{{ route('app.admin.news.delete.validate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $new->id }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
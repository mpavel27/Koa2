@extends('admin.app')
@section('main-container')
    <h1 class="h3 mb-3"><strong>Manage</strong> Events</h1>
    <div class="bg-white p-4 rounded-3 shadow">
        <table class="table table-bordered table-striped m-0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Created By</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <th scope="row">{{$event->id}}</th>
                    <td>{{$event->title}}</td>
                    <td>{{$event->event_date}}</td>
                    <td>{{ app('App\Http\Controllers\MainController')->getUsernameById($event->created_by) }}</td>
                    <td>{{$event->created_at}}</td>
                    <td>{{$event->updated_at}}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('app.admin.events.delete.validate') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $event->id }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection
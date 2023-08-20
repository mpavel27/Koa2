@extends('admin.app')
@section('main-container')
    <h1 class="h3 mb-3"><strong>Create</strong> Events</h1>

    <form action="{{ route('app.admin.events.create.validate') }}" method="post" class="bg-white p-4 rounded-3 shadow">
        @csrf
        <div class="mb-3">
            <label for="events_title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter news title" id="events_title" required>
        </div>
        <div class="mb-3">
            <label for="events_date" class="form-label">Start date</label>
            <input type="datetime-local" class="form-control" id="events_date" name="event_date">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
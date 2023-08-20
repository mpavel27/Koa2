@extends('admin.app')
@section('main-container')
    <h1 class="h3 mb-3"><strong>Update</strong> {{ $news->title }}</h1>

    <form action="{{ route('app.admin.news.manage.validate', $news->id) }}" method="post" class="bg-white p-4 rounded-3 shadow">
        @csrf
        <div class="mb-3">
            <label for="news_title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Enter news title" id="news_title" value="{{ $news->title }}" required>
        </div>
        <textarea id="editor" name="editor">{{ $news->content }}</textarea>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>

    <script>
        var editor = CKEDITOR.replace( 'editor' );
        editor.on( 'required', function( evt ) {
            editor.showNotification( 'This field is required.', 'warning' );
            evt.cancel();
        } );
    </script>
@endsection
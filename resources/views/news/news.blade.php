@extends('layouts.app')
@section('main-container')
    <section class="user bg-default">
        <div class="container py-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>{{ $news->title }}</div>
                    <span>{{ date('d-m-Y', strtotime($news->created_at)) }}</span>
                </div>
                <div class="card-body table-responsive text-white">
                    {!! $news->content !!}
                </div>
            </div>
        </div>
    </section>
@endsection

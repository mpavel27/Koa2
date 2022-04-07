@extends('layouts.app')
@section('main-container')
    @php
        use App\Http\Controllers\MainController;
    @endphp
    <section class="user bg-default">
        <div class="container py-5">
            <div class="row">
                @include('user.layouts.sidebar')
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{ $user->login }} | Characters
                        </div>
                        <div class="card-body">
                            <p class="text-muted"><span class="text-danger">*</span> By pressing the <b>DEBUG</b> button will reset your character position back to map 1.</p>
                            <table class="table table-striped table-hover table-bordered m-0">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>Class</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Yang</th>
                                    <th>EXP</th>
                                    <th>Debug</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($characters as $character)
                                    <tr style="height:51px;">
                                        <td style="text-align:left;">{{ MainController::getClassNameByJob($character->job) }}</td>
                                        <td style="text-align:left;">{{ $character->name }}</td>
                                        <td style="text-align:left;">{{ $character->level }}</td>
                                        <td style="text-align:left;">{{ $character->gold }}</td>
                                        <td style="text-align:left;">{{ $character->exp }}</td>
                                        <td style="width: 10%">
                                            <form method="POST" action="{{ route('app.user.character.debug', ['id' => $character->id]) }}">
                                                @csrf
                                                <input type="hidden" name="account_id" value="{{ $character->account_id }}">
                                                <button type="submit" class="btn btn-koa-secondary">DEBUG</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

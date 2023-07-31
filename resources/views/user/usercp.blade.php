@extends('layouts.app')
@section('main-container')
    <section class="user bg-default">
        <div class="container py-5">
            <div class="row">
                @include('user.layouts.sidebar')
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            {{ $user->login }} | Informations
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover table-bordered m-0">
                                <tbody>
                                    <tr style="height:51px;">
                                        <td style="width: 50%;text-align:left;">
                                            <p>User name: </p></td><td style="text-align:left;">{{ $user->login }}<p></p>
                                        </td>
                                    </tr>
                                    <tr style="height:51px;">
                                        <td style="width: 50%;text-align:left;">
                                            <p>E-mail address: </p></td><td style="text-align:left;">{{ $user->email }}<p></p>
                                        </td>
                                    </tr>
                                    <tr style="height:51px;">
                                        <td style="width: 50%;text-align:left;"><p><img src="{{ asset('assets/images/md.png') }}"> Coins: </p></td><td style="text-align:left;">{{ $user->coins }} <p></p></td>
                                    </tr>
                                    <tr style="height:51px;">
                                        <td style="width: 50%;text-align:left;"><p><img src="{{ asset('assets/images/jd.png') }}"> Tokens: </p></td><td style="text-align:left;">{{ $user->jcoins }} <p></p></td>
                                    </tr>
                                    <tr style="height:51px;">
                                        <td style="width: 50%;text-align:left;">
                                            <p>Last Play: </p></td><td style="text-align:left;">{{ $user->last_play }}<p></p>
                                        </td>
                                    </tr>
                                    <tr style="height:51px;">
                                        <td style="width: 50%;text-align:left;">
                                            <p>Create Time: </p></td><td style="text-align:left;">{{ $user->create_time }}<p></p>
                                        </td>
                                    </tr>
                                    <tr style="height:51px;">
                                        <td style="width: 50%;text-align:left;">
                                            <p>Characters: </p></td><td style="text-align:left;">{{ $countCharacters }}<p></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@extends('layouts.app')
@section('main-container')
    <section class="user bg-default">
        <div class="container py-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>Players Ranking</div>
                    <div class="d-flex gap-3">
                        <a class="text-decoration-none ranking-btn active" href="{{ route('app.ranking.players') }}">Players</a>
                        <a class="text-decoration-none ranking-btn" href="{{ route('app.ranking.guilds') }}">Guilds</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="ranking_players_table" class="table table-striped table-hover table-bordered m-0">
                        <thead>
                            <tr>
                                <th scope="col">Rank</th>
                                <th scope="col">Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Empire</th>
                                <th scope="col">Level</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($players as $key => $player)
                            <tr style="height:51px;">
                                <td style="text-align:left;">
                                    <p>{{ $key }}</p>
                                </td>
                                <td style="text-align:left;">
                                    <p>{{ $player['name'] }}</p>
                                </td>
                                <td style="text-align:left;">
                                    <p>{{ $player['class'] }}</p>
                                </td>
                                <td style="text-align:left;">
                                    <p>{{ $player['empire'] }}</p>
                                </td>
                                <td style="text-align:left;">
                                    <p>{{ $player['level'] }}</p>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <style>
        div#ranking_players_table_wrapper {
            color: white !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#ranking_players_table').DataTable();
        } );
    </script>
@endsection

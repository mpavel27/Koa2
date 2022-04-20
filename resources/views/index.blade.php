@extends('layouts.app')
@section('main-container')
<section class="news" style="padding-top: 4rem;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="koa-card mb-4">
                    <h3 class="koa-card-title">Latest News</h3>
                    <div class="koa-list">
                        <p><a href='#' class="news-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a></p>
                        <p><a href='#' class="news-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a></p>
                        <p><a href='#' class="news-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a></p>
                        <p><a href='#' class="news-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a></p>
                        <p><a href='#' class="news-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a></p>
                        <p><a href='#' class="news-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a></p>
                        <p><a href='#' class="news-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="koa-card" style="margin-bottom: 4rem;">
                    <h3 class="koa-card-title">Upcoming Events</h3>
                    <div class="koa-list">
                        <p class="d-flex justify-content-between"><span>OX Event #1</span><span>18.01.2022 - 18:30</span></p>
                        <p class="d-flex justify-content-between"><span>OX Event #1</span><span>18.01.2022 - 18:30</span></p>
                        <p class="d-flex justify-content-between"><span>OX Event #1</span><span>18.01.2022 - 18:30</span></p>
                        <p class="d-flex justify-content-between"><span>OX Event #1</span><span>18.01.2022 - 18:30</span></p>
                        <p class="d-flex justify-content-between"><span>OX Event #1</span><span>18.01.2022 - 18:30</span></p>
                        <p class="d-flex justify-content-between"><span>OX Event #1</span><span>18.01.2022 - 18:30</span></p>
                        <p class="d-flex justify-content-between"><span>OX Event #1</span><span>18.01.2022 - 18:30</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="ranking">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-6">
                <div class="koa-card my-3">
                    <div class='ranking-title d-flex justify-content-between'><h3 class="koa-ranking-card-title">Koa2 Ranking</h3><span><button class="ranking-btn active me-3" id="players_btn">Players</button><button class="ranking-btn" id="guilds_btn">Guilds</button></span></div>
                    <div class="koa-list-ranking" id="players">
                        @foreach($topPlayers as $key => $player)
                        <p>
                            <span class="ranking-list">
                                @if(strlen($key) == 2)
                                    {{ $key }}.
                                @else
                                    0{{ $key }}.
                                @endif
                            </span>
                            <span class="ranking-list" style="color: #ca7c7c;">{{ $player['name'] }}</span>
                            <span class="ranking-list">{{ $player['class'] }}</span>
                            @if($player['empire'] == 'Jinno')
                                <span class="ranking-list" style="color: #53b4ff">{{ $player['empire'] }}</span>
                            @elseif($player['empire'] == 'Shinsoo')
                                <span class="ranking-list" style="color: #ff535d">{{ $player['empire'] }}</span>
                            @elseif($player['empire'] == 'Chunjo')
                                <span class="ranking-list" style="color: #ffa853">{{ $player['empire'] }}</span>
                            @endif
                            <span class="ranking-list border-0">Lv. {{ $player['level'] }}</span>
                        </p>
                        @endforeach
                    </div>
                    <div class="koa-list-ranking" id="guilds">
                        @foreach($topGuilds as $guild)
                            <p>
                                <span class="ranking-list">
                                    @if(strlen($key) == 2)
                                        {{ $key }}.
                                    @else
                                        0{{ $key }}.
                                    @endif
                                </span>
                                <span class="ranking-list" style="color: #ca7c7c;">{{ $guild['name'] }}</span>
                                <span class="ranking-list">{{ $guild['leader'] }}</span>
                                @if($guild['empire'] == 'Jinno')
                                    <span class="ranking-list" style="color: #53b4ff">{{ $guild['empire'] }}</span>
                                @elseif($guild['empire'] == 'Shinsoo')
                                    <span class="ranking-list" style="color: #ff535d">{{ $guild['empire'] }}</span>
                                @elseif($guild['empire'] == 'Chunjo')
                                    <span class="ranking-list" style="color: #ffa853">{{ $guild['empire'] }}</span>
                                @endif
                                <span class="ranking-list border-0">{{ $guild['ladder_point'] }}</span>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="statistics">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" style="padding-top: 5rem">
                <div class="koa-card">
                    <h3 class="koa-card-title">Server Status</h3>
                    <div class="koa-list">
                        @if($ch1)
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel I</span><span class="online">Online</span></p>
                        @else
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel I</span><span class="offline">Offline</span></p>
                        @endif
                        @if($ch2)
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel II</span><span class="online">Online</span></p>
                        @else
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel II</span><span class="offline">Offline</span></p>
                        @endif
                        @if($ch3)
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel III</span><span class="online">Online</span></p>
                        @else
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel III</span><span class="offline">Offline</span></p>
                        @endif
                        @if($ch4)
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel IV</span><span class="online">Online</span></p>
                        @else
                            <p class="d-flex justify-content-between"><span class="beauty-text">Channel IV</span><span class="offline">Offline</span></p>
                        @endif
                        <p class="d-flex justify-content-between"><span class="beauty-text">Channel V</span><span class="offline">Offline</span></p>
                        <p class="d-flex justify-content-between"><span class="beauty-text">Channel VI</span><span class="offline">Offline</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" style="padding-top: 5rem; padding-bottom: 5rem;">
                <div class="koa-card">
                    <h3 class="koa-card-title">Server Statistics</h3>
                    <div class="koa-list">
                        <p class="d-flex justify-content-between"><span class="beauty-text">Online Players</span><span class="beauty-text">{{ $online_players }}</span></p>
                        <p class="d-flex justify-content-between"><span class="beauty-text">Online Players 24h</span><span class="beauty-text">{{ $online_players_24 }}</span></p>
                        <p class="d-flex justify-content-between"><span class="beauty-text">Created Accounts</span><span class="beauty-text">{{ $accounts }}</span></p>
                        <p class="d-flex justify-content-between"><span class="beauty-text">Created Characters</span><span class="beauty-text">{{ $characters }}</span></p>
                        <p class="d-flex justify-content-between"><span class="beauty-text">Created Guilds</span><span class="beauty-text">{{ $guilds }}</span></p>
                        <p class="d-flex justify-content-between"><span class="beauty-text">Created Shops</span><span class="beauty-text">100</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

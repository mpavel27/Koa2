@extends('layouts.app')
@section('main-container')
    <section class="user bg-default">
        <div class="container py-5">
            <div class="card">
                <div class="card-header">
                    <div>Login</div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h4 class="m-0" style="color: #d5cb76;">User Panel</h4>
                        <p class="text-white"><span style="color: #a45f5f;">Not registered yet?</span> <button class="unstyled-btn" data-bs-toggle="modal" data-bs-target="#registerModal">Sign up</button></p>
                        <form method="POST" action="/login/validate" class="px-5">
                            @csrf
                            <input type="text" name="login" class="custom-input w-50 mb-3" placeholder="Username" autocomplete="off">
                            <input type="password" name="password" class="custom-input w-50 mb-3" placeholder="Password" autocomplete="off">
                            <p style="color: #a45f5f;">I have forgot my password<br><span class='text-white'>Recover my account</span></p>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-koa mb-3">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

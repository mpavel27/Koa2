<div class="col-md-2 w-auto">
    <div class="card">
        <div class="card-body">
            <ul class="list-unstyled m-0">
                <li class="mb-3">
                    <a href="{{ route('app.user') }}" class="btn @if(request()->url() == route('app.user')) btn-koa @else btn-koa-secondary @endif">Information</a>
                </li>
                <li>
                    <a href="{{ route('app.user.characters') }}" class="btn @if(request()->url() == route('app.user.characters')) btn-koa @else btn-koa-secondary @endif">Characters</a>
                </li>
                <li class="my-3">
                    <a href="#" class="btn btn-koa-secondary">Security</a>
                </li>
                <li>
                    <a href="{{ route('app.logout') }}" class="btn btn-koa-secondary">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
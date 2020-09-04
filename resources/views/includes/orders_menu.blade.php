<nav class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#minnav" aria-controls="minnav" aria-expanded="false" aria-label="Toggle navigation" style="border: none">
        <span class="navbar-toggler-icon"></span>
        PRINT ON DEMAND
    </button>
    <div class="collapse navbar-collapse" id="minnav">
        <ul class="navbar-nav">
            <li class="nav-item {{ (request()->is('admin/homepage/orders')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('orders.index')}}">All</a>
            </li>
            <li class="nav-item {{ (request()->is('admin/orders/pending')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('pending.order')}}">Pending
                    @if($pending_count->count()>0)
                        <span class="badge badge-pill badge-danger" style="font-size: 10px; top:-5px">{{$pending_count->count()}}</span>
                    @endif

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/orders/processing')) ? 'active' : '' }}" href="{{route('process.order')}}">Processing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/orders/complete')) ? 'active' : '' }}" href="{{route('complete.order')}}">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/orders/cancelled')) ? 'active' : '' }} " href="{{route('cancel.order')}}">Cancelled</a>
            </li>
        </ul>
    </div>
</nav>
<hr>

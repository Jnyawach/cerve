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
            <li class="nav-item {{ (request()->is('admin/homepage/orders/pending')) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('pending.order')}}">Pending
                    @if($pending->count()>0)
                        <span class="badge badge-pill badge-danger" style="font-size: 10px; top:-5px">{{$pending->count()}}</span>
                    @endif

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/homepage/printing/process')) ? 'active' : '' }}" href="{{route('process.print')}}">Processing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/homepage/printing/complete')) ? 'active' : '' }}" href="{{route('complete.print')}}">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/homepage/printing/complete')) ? 'active' : '' }} " href="{{route('cancel.print')}}">Cancelled</a>
            </li>
        </ul>
    </div>
</nav>
<hr>

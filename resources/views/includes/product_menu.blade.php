<h4>{{$product_header=''}}</h4>
<div class="pills-regular">
    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/homepage/products')) ? 'active' : '' }}" id="pills-home-tab" href="{{route('products.index')}}" role="tab" aria-controls="home" aria-selected="true">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('live')) ? 'active' : '' }}"   href="{{route('live')}}" role="tab" aria-controls="profile" aria-selected="false">Live </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('active')) ? 'active' : '' }} "   href="{{route('active')}}" role="tab" aria-controls="contact" aria-selected="false">Inactive</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('sold')) ? 'active' : '' }}"   href="{{route('sold')}}" role="tab" aria-controls="contact" aria-selected="false">Sold Out</a>
        </li>
        <li class="nav-item">
            <a class="nav-link  {{ (request()->is('admin/homepage/products/create')) ? 'active' : '' }}"   href="{{route('products.create')}}" role="tab" aria-controls="contact" aria-selected="false">Add Products</a>
        </li>
    </ul>

</div>

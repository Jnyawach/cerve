<h4>{{$product_header=''}}</h4>
<div class="pills-regular">
    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/homepage/faqs-panel')) ? 'active' : '' }}" id="pills-home-tab" href="{{route('faqs-panel.index')}}" role="tab" aria-controls="home" aria-selected="true">All</a>
        </li>

        @foreach($categories as $category)
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/homepage/faqs-panel/'.$category->id)) ? 'active' : '' }}" id="pills-home-tab" href="{{route('faqs-panel.show', $category->id)}}" role="tab" aria-controls="home" aria-selected="true">{{$category->name}}</a>
            </li>
        @endforeach

    </ul>

</div>

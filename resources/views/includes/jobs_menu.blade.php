<div class="pills-regular">
    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/homepage/jobs/'.$job->slug)) ? 'active' : '' }}" id="pills-home-tab" href="{{route('jobs.show', $job->slug)}}" role="tab" aria-controls="home" aria-selected="true">Position</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('admin/homepage/applicant')) ? 'active' : '' }}"   href="{{route('applicant.index')}}" role="tab" aria-controls="profile" aria-selected="false">Applicants </a>
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

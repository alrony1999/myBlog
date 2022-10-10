<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Filter By Category
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/">All</a>
        @foreach ($categories as $category )
        <a class="dropdown-item"
            href="/?category={{$category->slug}}&{{ http_build_query(request()->except('category','page')) }}">{{ucwords($category->name)}}</a>
        @endforeach
    </div>
</div>
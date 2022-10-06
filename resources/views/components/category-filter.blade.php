<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Filter By Category
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="/">All</a>
        @foreach ($categories as $category )
        <a class="dropdown-item" href="/?category={{$category->slug}}">{{ucwords($category->name)}}</a>
        @endforeach
    </div>
</div>

{{--
<select class="form-select" aria-label="Default select example">
    <option selected></option>

</select> --}}
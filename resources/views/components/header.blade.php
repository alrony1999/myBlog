<section>
    <div class="row my-5" style="height: 30px">

        <div class="col-md-3 offset-3 border-1">
            <x-category-filter />
        </div>
        <div class="col-md-4 ml-4">
            <div class="input-group">
                <div class="form-outline">
                    <form action="/" method="GET">
                        @if(request('category'))
                        <input type="hidden" name="category" value="{{request('category')}}">
                        @endif
                        <input type="search" name="search" id="form1" class="form-control" placeholder="Search..." />
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<x-layout>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-2 px-md-2">Create Post</h3>

                            <form method="POST" action="{{route('author.create-post')}}" class="px-md-1"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-outline mt-1">
                                    <label class="form-label" for="form3Example1q">Title</label>
                                    <input type="text" name="title" value="{{old('title')}}" id="form3Example1q"
                                        class="form-control" />
                                    @error('title')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Slug</label>
                                    <input type="text" name="slug" value="{{old('slug')}}" id="form3Example1q"
                                        class="form-control" />
                                    @error('slug')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Excerpt</label>
                                    <textarea name="excerpt" cols="60">{{old("excerpt")}}</textarea>
                                    @error('excerpt')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Body</label>
                                    <textarea name="body" cols="60" rows="1">{{old('body')}}</textarea>
                                    @error('body')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        @foreach (\App\Models\Category::all() as $category )
                                        <option value="{{$category->id}}" {{old('category->
                                            id')==$category->id?'selected':''}} >{{ucwords($category->name)}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class=" form-outline mb-4">
                                    <label>Thumbnail</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" name="thumbnail" onchange="previewImage(this)" />
                                        </div>
                                        <div class="col-md-6">
                                            <img src="" id="post-thumbnail" class="rounded img-thumbnail">
                                        </div>
                                    </div>

                                    @error('thumbnail')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success btn-lg mb-1">Submit</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
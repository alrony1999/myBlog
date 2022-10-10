<x-layout>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Edit Post</h3>

                            <form method="POST" action="{{route('author.post-update',['post'=>$post->slug])}}"
                                class="px-md-2" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="form-outline mb-1">
                                    <label class="form-label" for="form3Example1q">Title</label>
                                    <input type="text" name="title" value="{{ $post->title??old('title') }}"
                                        id="form3Example1q" class="form-control" />
                                    @error('title')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Slug</label>
                                    <input type="text" name="slug" value="{{ $post->slug??old('slug')}}" id="
                                        form3Example1q" class="form-control" />
                                    @error('slug')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Excerpt</label>
                                    <textarea name="excerpt" cols="60">{{ $post->title??old('excerpt')}}</textarea>
                                    @error('excerpt')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Body</label>
                                    <textarea name="body" cols="60" rows="3">{{
                                        $post->title??old('body')}}</textarea>
                                    @error('body')
                                    <p class="text-danger text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        @foreach (\App\Models\Category::all() as $category )
                                        <option value="{{$category->id}}" {{ (($post->category_id ?? old('category_id'))
                                            == $category->id) ? 'selected':''}} >{{ucwords($category->name)}}
                                        </option>
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
                                            <input type="file" name="new-thumbnail" id="form3Example1q"
                                                onchange="previewImage(this)" />
                                        </div>
                                        <div class=" col-md-6">
                                            <img src="{{asset('images/posts/'.$post->thumbnail)}}" id="post-thumbnail"
                                                class="rounded img-thumbnail">
                                        </div>
                                    </div>

                                    @error('new-thumbnail')
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
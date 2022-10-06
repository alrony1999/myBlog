<x-layout>
    <section>
        <div class="container">
            @include('components.header')
            @if($posts->count())
            <div class="row my-3 ">
                <div class="col-md-6">
                    <div class="card" style="width: 100%;height:20rem;">
                        <img src="{{asset('images/posts/'.$posts[0]->thumbnail)}}" class="card-img-top" width="100%"
                            height="100%" alt="Post Thumbnail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0" style="width: 100%;height:20rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$posts[0]->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted mt-2">By <a
                                    href="/?author={{$posts[0]->author->username}}">{{ucwords($posts[0]->author->name)}}</a>
                                in <a
                                    href="/?category={{$posts[0]->category->slug}}">{{ucwords($posts[0]->category->name)}}</a>
                            </h6>
                            <p class="card-text">{{$posts[0]->excerpt}}</p>
                            <a href="/posts/{{$posts[0]->slug}}" class="btn btn-primary mt-3 float-right mr-5">Read
                                More</a>
                        </div>
                    </div>
                </div>
            </div>
            @if($posts->count()>1)
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mt-3">

                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('images/posts/'.$post->thumbnail)}}" class="card-img-top"
                            alt="Post Thumbnail">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted mt-2">By <a
                                    href="/?author={{$post->author->username}}">{{ucwords($post->author->name)}}</a>
                                in <a href="/?category={{$post->category->slug}}">{{ucwords($post->category->name)}}</a>
                            </h6>
                            <p class="card-text">{{$post->excerpt}}</p>
                            <a href="/posts/{{$post->slug}}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="mt-2 ml-auto">
                    {{$posts->links()}}
                </div>
            </div>
            @endif
            @else
            <h1 class="text-center">Empty</h1>
            @endif
    </section>
</x-layout>
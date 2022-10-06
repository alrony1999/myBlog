<x-layout>
    <section>
        <div class="container">
            <div class="row my-3  ">
                <div class="col-md-5 mt-4">
                    <div class="card" style="width: 100%;height:30rem;">
                        <img src="{{asset('images/posts/'.$post->thumbnail)}}" class="card-img-top" width="100%"
                            height="100%" alt="Post Thumbnail">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card border-0" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <h6 class="card-subtitle mb-2 text-muted mt-2">By <a
                                    href="/?author={{$post->author->username}}">{{ucwords($post->author->name)}}</a>
                                in <a href="/?category={{$post->category->slug}}">{{ucwords($post->category->name)}}</a>
                            </h6>
                            <p class="card-text">{!!$post->body!!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            </div>
    </section>
</x-layout>
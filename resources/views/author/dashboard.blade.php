<x-layout>
    <section>
        <div class="row my-5" style="height: 30px">

            <div class="col-md-3 offset-2 border-1">
            </div>
            <div class="col-md-4 text-center">
                <div class="input-group">
                    <div class="form-outline">
                        <form action="/author/dashboard/" method="GET">
                            <input type="search" name="search" id="form1" class="form-control"
                                placeholder="Search Post..." />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container table-bordered">
                <button type="button" class="btn btn-info mx-1 float-right text-center my-1">Total Post :
                    {{$count}}</button>
                <a href="{{route('author.create-post')}}" class="btn btn-primary float-right text-center my-1">Add New
                    Post</a>
                <table class="table table-striped">
                    <h1 class="text-center">All Post</h1>
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col" colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post )
                        <tr>
                            <th scope="row" class="text-center">{{$post->id}}</th>
                            <td><a href="{{route('posts.show',['post'=>$post->slug])}}">{{$post->title}}</a></td>
                            <td class="text-center"><a href="/author/posts/{{$post->slug}}/edit"
                                    class="btn btn-warning">Edit</a></td>
                            <td class="text-center">

                                <form id="post-delete" method="POST"
                                    action="{{route('author.post-delete',['post'=>$post->slug])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$posts->links()}}
            </div>
        </div>
    </section>
</x-layout>
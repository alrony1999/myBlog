<x-layout>
    <section>
        <div class="row my-5" style="height: 30px">

            <div class="col-md-3 offset-2 border-1">
            </div>
            <div class="col-md-4 text-center">
                <div class="input-group">
                    <div class="form-outline">
                        <form action="/admin/dashboard/" method="GET">
                            <input type="search" name="search" id="form1" class="form-control"
                                placeholder="Search Author..." />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container table-bordered my-2">
                <button type="button" class="btn btn-info mx-1 float-right text-center my-1">Total Author :
                    {{$count}}</button>
                <a href="{{route('admin.author-create')}}" class="btn btn-primary float-right text-center my-1">Add New
                    Author</a>
                <table class="table table-striped">
                    <h1 class="text-center">All Author</h1>
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author )
                        <tr>
                            <th scope="row" class="text-center">{{$author->id}}</th>
                            <td><a href="/?author={{$author->username}}">{{ucwords($author->username)}}</a></td>
                            <td>{{$author->email}}</td>
                            <td class="text-center">
                                <form id="author-delete" method="POST"
                                    action="{{route('admin.author-delete',['user'=>$author->username])}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- {{$authors->links()}} --}}
            </div>
        </div>
    </section>
</x-layout>
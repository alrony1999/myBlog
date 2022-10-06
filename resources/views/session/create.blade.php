<x-layout>
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                    <div class="card rounded-3">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Login Info</h3>

                            <form method="POST" action="/login" class="px-md-2">
                                @csrf
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Email</label>
                                    <input type="email" name="email" value="{{old(" email")}}" id="form3Example1q"
                                        class="form-control" />
                                    @error('email')
                                    <p class="text-red text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1q">Password</label>
                                    <input type="password" name="password" id="form3Example1q" class="form-control"
                                        autocomplete="new-password" />
                                    @error('password')
                                    <p class="text-red text-xs mt-2">{{$message}}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success btn-lg mb-1">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
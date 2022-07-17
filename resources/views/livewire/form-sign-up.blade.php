
<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
            <form method="POST" action="{{route('register')}}">
                @csrf
                <div class="mb-3">
                    <label>{{__('ui.name')}}</label>
                    <input type="text" name="name" class="form-control">
                    @error('name')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>{{__('ui.surname')}}</label>
                    <input type="text" name="surname" class="form-control">
                    @error('surname')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>{{__('ui.email_address')}}</label>
                    <input type="email" name="email" class="form-control">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label >{{__('ui.password')}}</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label >{{__('ui.password_confirmation')}}</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
                    @error('password_confirmation')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-custom fw-bold my-5">{{__('ui.register')}}!</button>
            </form>
            </div>
        </div>
    </div>
</div>

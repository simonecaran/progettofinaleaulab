<x-layout>
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <h2>{{__('ui.login')}}</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center align-items-center "> 
        <div class="col-12 col-md-6">

        <form method="POST" action="{{route('login')}}">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1">{{__('ui.email_address')}}</label>
                <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">{{__('ui.password')}}</label>
                <input type="password" name='password' class="form-control" id="exampleInputPassword1">
                @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
            </div>
            <button type="submit" class="btn btn-custom fw-bold">{{__('ui.login')}}</button>
        </form>
        </div>
    </div>
</div>
@if(session('locale')=='ab')
        <script>
            window.history.pushState('','','entr\'')
        </script>
        @elseif(session('locale')=='it')                
        <script>
            window.history.pushState('','','entra')
        </script>
        @elseif(session('locale')=='gb')
        <script>
            window.history.pushState('','','login')
        </script>
    @endif
</x-layout>
<form action="{{route('set_language_locale',$lang)}}" method="POST">
@csrf
    <button type="submit" id="btnGradient" class="nav-link text-center {{$custclass}}" style="background-color:transparent; border:none">
        <p class="fs-4">| {{$nation}} </p>
    </button>
</form>
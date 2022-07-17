  <!-- navbar -->
  <div class="navbar  d-flex" style="z-index: 99;">
    <div class="row w-100">
      <div class="col-6 col-md-6 d-flex justify-content-center align-items-center">
        <a href="{{route('home')}}">
          <img class="logo" id="logo" src="/img/presto-logo.svg" alt="" width="200px">
        </a>

      </div> 
        
      <!-- searchbar  -->
      <form action="{{route('ricerca.annuncio')}}" class="col-6 col-md-4 d-flex justify-content-end align-items-center" method="GET">
        <div class="search-box">
          <button class="btn-search"><i class="bi bi-search"></i></button>
          <input type="text" name="searched" class="input-search" placeholder="{{__('ui.searchbar_text')}}">
        </div>
      </form>
      <!--fine searchbar  -->
        @guest
      <div class="icon-nav col-2 col-md-2">
        <div class="row h-100">
          <div class="col-md-4">
              <a class="d-flex flex-column justify-content-center align-items-center" href="{{route('login')}}"><img src="/img/presto-login-icon.svg" alt="" width="85%" height="">
              <p class="text-login">{{__('ui.login')}}</p></a>      
            </div>
          <div class="col-md-4">
              <a class="d-flex flex-column justify-content-center align-items-center" href="{{route('announcements.create')}}">
              <img src="/img/presto-aggiungi-icon.svg" alt="" width="85%" height="">
              <p class="text-login">{{__('ui.add_announcement')}}</p></a>
          </div>
        </div>    
      </div>
        @else
      <div class="icon-nav col-2 col-md-2">
        <div class="row h-100 align-items-center">
          <div class="col-md-3">
            <a class="d-flex flex-column justify-content-center align-items-center" href="{{route('profile', Auth::user())}}">
            <img src="/img/presto-login-icon.svg" alt="" width="85%" height="">
            <p class="text-login text-center" style="line-height:15px;" >{{Auth::user()->name}}</p></a>
          </div>
          <div class="col-md-3">
          <a class="d-flex flex-column justify-content-center align-items-center position-relative" href="{{route('cart')}}">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style=" background-color: #FF0091;">
                    {{App\Models\User::countCart()}}
                    <span class="visually-hidden">unread messages</span>
            </span>
                <img src="/img/presto-carrello-icon.svg" alt="" width="85%" height="">
                <p class="text-login">Carrello</p>
            </a>
          </div>
          <div class="col-md-3">
            <a class="d-flex flex-column justify-content-center align-items-center" href="{{route('announcements.create')}}">
            <img src="/img/presto-aggiungi-icon.svg" alt="" width="85%" height="">
            <p class="text-login">{{__('ui.add_announcement')}}</p></a>
          </div>    
        </div>  
      </div>
        @endguest
      </div>
    </div>


  <input type="checkbox" class="openSidebarMenu noScroll" id="openSidebarMenu">
    <label for="openSidebarMenu" class="sidebarIconToggle">
      <div class="spinner diagonal part-1"></div>
      <div class="spinner horizontal"></div>
      <div class="spinner diagonal part-2"></div>
    </label>
  <div id="sidebarMenu" style="z-index: 98;">
    <ul class="sidebarMenuInner">
      <li><a class="title fs-1" href="/">{{__('ui.home')}}</a></li>
      <li><a class="title fs-1" href="{{route('all.announcements')}}">{{__('ui.navbar_announcements')}}</a></li>
      <li><a class="title fs-1" href="{{route('contacts')}}">{{__('ui.contacts')}}</a></li>   
     
      <hr>

       <!-- lingue -->
       
      <li class='d-flex justify-content-center'>
        <x-locale custclass="tricolore" lang='it' nation='it'/>
        <x-locale custclass="unionjack" lang='en' nation='gb'/> 
        <x-locale custclass="abruzzo" lang='ab' nation='ab'/> 
      </li>
      <!-- fine lingue -->


      <ul class="auth d-flex">
      @guest
            <li class="fs-4">
              <a href="{{route('login')}}">
              <img class="m-auto" src="/img/presto-login-icon.svg" alt="" width="20%" height="">
              {{__('ui.login')}}</a>
            </li>     
            <li class="fs-4">
            <a href="{{route('register')}}">
              <img class="m-auto" src="/img/presto-register-icon.svg" alt="" width="20%" height="" >
              {{__('ui.register')}}</a>
            </li>
        @else
        <li>
          <a class="d-flex flex-column justify-content-center align-items-center" href="{{route('announcements.create')}}">
              <img src="/img/presto-aggiungi-icon.svg" alt="" width="25%" height="">
              <p class="text-login fs-4">{{__('ui.add_announcement')}}</p></a>
        </li>
        <li class="d-none d-md-block">
            <a class="d-flex flex-column justify-content-center align-items-center" href="/logout" onclick="event.preventDefault(); getElementById('form-logout').submit();">
              <img src="/img/presto-logout-icon.svg" alt="" width="25%" height="">
                    <p class="text-login fs-4">{{__('ui.logout')}}</p></a>
          <form action="{{route('logout')}}" id="form-logout" method="post" class="d-none">
            @csrf
          </form>
        </li>
        <li class="d-md-none d-block">
            <a class="d-flex flex-column justify-content-center align-items-center position-relative" href="{{route('cart')}}">
            <span class="position-absolute top-0 end-0 translate-middle badge rounded-pill" style=" background-color: #FF0091;">
                    {{App\Models\User::countCart()}}
                    <span class="visually-hidden">unread messages</span>
                  </span>
                  <img src="/img/presto-carrello-icon.svg" alt="" width="30%" height="">
                  <p class="text-login fs-4">Carrello</p>
            </a>
          </li>

      </ul>
        <!-- <li class="d-md-none d-block">
          <a class="d-flex flex-column justify-content-center align-items-center" href="{{route('announcements.create')}}">
              <img src="/img/presto-login-icon.svg" alt="" width="25%" height="">
              <p class="text-login fs-4">{{Auth::user()->name}}</p></a>
        </li> -->
        <ul class="auth d-flex">
          <li class="d-md-none d-block">
            <a class="d-flex flex-column justify-content-center align-items-center" href="{{route('profile', Auth::user())}}">
                <img src="/img/presto-login-icon.svg" alt="" width="25%" height="">
                <p class="text-login fs-4">{{Auth::user()->name}}</p></a>
          </li>
          <li class="d-md-none">
            <a class="d-flex flex-column justify-content-center align-items-center" href="/logout" onclick="event.preventDefault(); getElementById('form-logout').submit();">
              <img src="/img/presto-logout-icon.svg" alt="" width="25%" height="">
                    <p class="text-login fs-4">{{__('ui.logout')}}</p></a>
          <form action="{{route('logout')}}" id="form-logout" method="post" class="d-none">
            @csrf
          </form>
        </li>

          <!-- Aggiungere carrello -->
        </ul>
        @endguest
    </ul> 

    
  </div>


  
  <!-- fine navbar -->


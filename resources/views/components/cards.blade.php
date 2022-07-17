<div class="card">   
    <div class="position-relative">
        <!-- Modo nuovo per prendere le IMG -->
                @if(count($announcement->images)>0)
                <img src="{{$announcement->images->first()->getUrl(300,400)}}" class="card-img-top rounded" alt="..." style="height:400px;">
                @else
                <img src="/img/default.jpg" class="card-img-top rounded"  style="height:400px;" alt="">
                @endif
        <div class="card-categoria">
            <a href="{{route('category.show', $announcement->category)}}">
                <img class="home-img" src="{{$announcement->category->icon}}" alt="{$announcement->category->name">
            </a>
        </div>
        <div class="mx-auto lineCard"></div>
    </div> 
    <div class="card-body d-flex flex-column align-items-center">
        <h5 class="card-title">{{$announcement->title}}</h5>
            <p class="card-text">{{(strlen($announcement->body) > 20) ? substr($announcement->body, 0, 20) . '...' : $announcement->body;}}</p>
            @if(Route::currentRouteName() == 'home')
            <p class="card-text">{{__('ui.published')}} {{$announcement->created_at->diffForHumans()}}</p> 
            @else
            <p class="card-text">{{__('ui.published')}}: {{$announcement->created_at->format('d/m/Y')}}</p> 
            @endif
            <a href="{{route('announcement.show',compact('announcement'))}}"class="btn btn-outline-secondary d-flex justify-content-center align-items-center my-2">{{__('ui.view')}} <img src="/img/icone/presto_icona-all.svg" style="width:20px;" alt=""class="ms-2"></a>   
            <livewire:favorites :announcement="$announcement" />           
    </div>
</div>
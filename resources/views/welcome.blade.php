<x-layout>
    
<x-header />
@if(count($announcements)>0)
<h3 class='text-center'>{{__('ui.all_category_welcome')}}</h3>
<div class="container mt-5">
    <div class="row">
        @foreach($moreAnn as $category_moreAnn)
        <div class="col-6 col-lg-3 d-flex justify-content-center py-2">
            <a class='no_decoration d-flex align-items-center flex-column colorCustomCategory' href="{{route('category.show', $category_moreAnn)}}">
                <div class='d-flex align-items-center flex-column border-custom'>
                    <img width='60%' src="{{$category_moreAnn->icon}}" alt="">
                </div>
                <p class='text-color text-center fs-4 mt-3'><x-category-name categoryName="{{$category_moreAnn->name}}"/></p>
            </a>
        </div>
        @endforeach
    </div>
</div>
<h3 class="text-center my-5">{{__('ui.allAnnouncements')}}</h3>
<!-- Swiper  -->
<div class="swiper swiperAnnouncements mb-5" >
    <div class="swiper-wrapper">
        @foreach($announcements as $announcement)
            <div class="swiper-slide">
                <x-cards :announcement="$announcement"/>
            </div>
        @endforeach
    </div>
    <div class="swiper-button-prev color1"></div>
    <div class="swiper-button-next color2"></div>
</div>
@else
    <x-bladewind.empty-state
        message="{{__('ui.no_announcement')}}">
        <a href="{{route('register')}}" class="btn btn-primary">{{__('ui.register_to_add_announcement')}}</a>
    </x-bladewind.empty-state>
@endif

<!-- @if(session('locale')=='ab')
    <script>
        window.history.pushState('','','allaCas\'')
    </script>
@elseif(session('locale')=='it')                
    <script>
        window.history.pushState('','','benvenuto')
    </script>
@elseif(session('locale')=='gb')
    <script>
         window.history.pushState('','','home')
    </script>
@endif-->
</x-layout> 
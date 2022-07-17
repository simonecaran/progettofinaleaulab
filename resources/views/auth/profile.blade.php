<x-layout>
<div class="container">
    <div class="row">
        <div class="col-12 my-5">
            <h2 class="text-center">{{__('ui.logged')}} {{$user->name}} {{$user->surname}}</h2>
        </div>
    </div>
</div>
<div class="container mt-3 mb-5">
    <div class="row justify-content-between">
@if(Auth::user() && Auth::user()->is_revisor  || Auth::user()->is_admin)
<!-- Da inserire fighezza per notifiche revisore -->
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-7 col-md-3 d-flex justify-content-center">
                <div class="position-relative">
                    <span class="position-absolute top-0 translate-middle badge rounded-pill" style="background: #0072FF;">
                    {{App\Models\Announcement::toBeRevisionedCount()}}
                    <span class="visually-hidden">unread messages</span>
                    </span>
                    <a href="{{route('revisor-panel')}}" class="btn text-white" style=" background: #FF0091;">{{__('ui.revisor_panel')}}</a>
                </div>
            </div>
            <div class="col-2 me-2 col-md-5 d-flex justify-content-start">
                <div class="position-relative">
                    <span class="position-absolute top-0 translate-middle badge rounded-pill" style=" background: #FF0091;">
                    {{App\Models\Announcement::toBeTrash()}}
                    <span class="visually-hidden">unread messages</span>
                    </span>
                    <a href="{{route('trash-can')}}" class="btn text-white" style="background: #0072FF;"><i class="bi bi-trash3"></i></a>
                </div>
            </div>
            @endif

            <div class="col-2 col-md-3 d-flex justify-content-center">
                <div class="position-relative">
                    <a href="{{route('favourite')}}" class="btn" style="color: #FF0091; border-color: #FF0091;">Preferiti<i wire:click="like" class="cuore ms-1 bi bi-heart" style="cursor: pointer;"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @if(Auth::user()->getAcceptedAnnouncement()>0)
            <div class="swiper swiperAnnouncements mb-5" >
                <div class="swiper-wrapper">
                    @foreach(Auth::user()->announcements as $announcement)
                        @if($announcement->is_accepted)
                            <div class="swiper-slide">
                                <x-cards :announcement="$announcement"/>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-button-prev color1"></div>
                    <div class="swiper-button-next color2"></div>
                </div>
            @else
            <x-bladewind.empty-state
                message="{{__('ui.profile_empty_state')}}">
            </x-bladewind.empty-state>
            @endif

        </div>
    </div>
    </div> 

</x-layout>
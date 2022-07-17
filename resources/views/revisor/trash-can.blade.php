<x-layout>
@if($announcement)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
               <h2 class="text-center my-4" >Annuncio di: {{$announcement->user->name}} {{$announcement->user->surname}}</h2>

            </div>
        </div>
    </div>
<div class="container">
       <div class="row justify-content-center">
           <div class="col-12 col-md-6">
           @if(count($announcement->images)==0)
            <!-- Immagine di default -->
            <img src="/img/default.jpg" alt="">
            @elseif(count($announcement->images)==1)
            <img src="{{$announcement->images->first()->getUrl()}}" class="card-img-top rounded" alt="..." style="height:400px;">
            @else          
             <!-- Swiper -->
              <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper swiperThumbGallery2">
                <div class="swiper-wrapper">
                  @foreach($announcement->images as $image)
                  <div class="swiper-slide">
                    <img src="{{$image->getUrl()}}" />
                  </div>
                  @endforeach
                </div>
                <div class="swiper-button-next color1"></div>
                <div class="swiper-button-prev color2"></div>
              </div>
              <div thumbsSlider="" class="swiper swiperThumbGallery">
                <div class="swiper-wrapper">
                @foreach($announcement->images as $image)
                  <div class="swiper-slide">
                    <img src="{{$image->getUrl()}}" />
                  </div>
                  @endforeach
                </div>
            </div>
            @endif
          </div> <!--Fine col swiper -->
       </div>
       <!-- EndSwiper -->
   </div>
   <div class="container">
     <div class="row justify-content-center">
       <div class="col-12 col-md-6 my-5">
            <h2>{{$announcement->title}}</h2>
            <hr>
            <h5 class="mb-2" >{{$announcement->body}}</h5>
            <h5 class="mb-4 fw-light">{{$announcement->price}}&euro;</h5>
         
           <div class="row flex-direction-row justify-content-between">
         <div class="col-6">
         <form action="{{route('manda.in.revisione',['announcement'=>$announcement])
         }}"method="POST">
         @csrf
         @method('PATCH')
              <button type="submit" class="btn btn-success shadow">Manda in Revisione</button>
         </form>
         
    </div>
    <div class="col-6">
         <form action="{{route('delete.announcement',['announcement'=>$announcement])
         }}"method="POST">
         @csrf
         @method('DELETE')
             <button type="submit"class="btn btn-danger shadow">Cancella</button>
         </form>
    </div>
</div>
       </div>
     </div>
   </div>
   @else

   <x-bladewind.empty-state
    message="Non hai annunci da approvare">
    </x-bladewind.empty-state>
   @endif
</x-layout>
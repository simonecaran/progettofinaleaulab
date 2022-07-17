<x-layout>
  @if($announcement_to_check)
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 text-center">
               <h2>{{__('ui.announcement_owner')}} {{$announcement_to_check->user->name}} {{$announcement_to_check->user->surname}}</h2>

            </div>
        </div>
    </div>
<div class="container my-3 py-3">
  <div class="row justify-content-center">
    <div class="col-12 col-md-6">
             <!-- Swiper -->
             @if(count($announcement_to_check->images)==0)
            <!-- Immagine di default -->
            <img src="/img/default.jpg" alt="">
            @elseif(count($announcement_to_check->images)==1)
            <div class="d-flex justify-content-center">
              <img src="{{$announcement_to_check->images->first()->getUrl()}}" class="rounded" alt="...">
            </div>
            @else          
             <!-- Swiper -->
              <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper swiperThumbGallery2">
                <div class="swiper-wrapper">
                  @foreach($announcement_to_check->images as $image)
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
                @foreach($announcement_to_check->images as $image)
                  <div class="swiper-slide">
                    <img src="{{$image->getUrl()}}" />
                  </div>
                  @endforeach
                </div>
            </div>
            @endif
    </div> <!--Fine col swiper -->
    <div class="col-12 col-md-6" style="overflow-x:auto">
          <h5 class="text-center">Revisione immagini</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Image Number</th>
                <th scope="col">Adulti</th>
                <th scope="col">Satira</th>
                <th scope="col">Medicina</th>
                <th scope="col">Violenza</th>
                <th scope="col">Contenuto Ammiccante</th>
              </tr>
            </thead>
            <tbody>
            @foreach($announcement_to_check->images as $image)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td><span class="{{$image->adult}}"></span></td>
                <td><span class="{{$image->spoof}}"></span></td>
                <td><span class="{{$image->medical}}"></span></td>
                <td><span class="{{$image->violence}}"></span></td>
                <td><span class="{{$image->racy}}"></span></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        <h5 class="text-center">Tags</h5>
      @if(count($announcement_to_check->images) == 1)
      <div>
        @foreach($announcement_to_check->images()->first()->labels as $label)
          <p>{{$label}}</p>
        @endforeach
      </div> 
      @else
        @foreach($announcement_to_check->images as $image)
        <div class="imageLabels visually-hidden">
          @if($image->labels)
            @foreach($image->labels as $label)
            <p>{{$label}}</p>
            @endforeach
            @else
            <p>Attendi il caricamento...</p>
          @endif
        </div>
        @endforeach
      @endif

    </div> <!-- Fine col table -->
  </div> <!--End row -->
</div><!--End container -->
       <!-- EndSwiper -->
  

   <div class="container my-3">
     <div class="row justify-content-center mb-5">
       <div class="col-12">
         <h2>{{$announcement_to_check->title}}</h2>
         <hr width="30%">
         <h6 class="mb-4">{{$announcement_to_check->user->name}}</h6>
         <h5 class="mb-2">{{$announcement_to_check->body}}</h5>
         <h5 class="mb-4 fw-light">{{$announcement_to_check->price}}&euro;</h5>
        
          <div class="row flex-direction-row justify-content-between">
            <div class="col-6">
                <form action="{{route('accept.announcement',['announcement'=>$announcement_to_check])}}"method="POST">
                @csrf
                @method('PATCH')
                      <button type="submit" class="btn btn-success shadow">{{__('ui.accept')}}</button>
                      <button type="button" class="btn btn-danger shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">{{__('ui.reject')}}</button>
                </form>
            </div>      
            </div>
        </div>
      </div>
    </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('ui.reason_for_reject')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <form action="{{route('reject.announcement',['announcement'=>$announcement_to_check])}}"method="POST">
                    @csrf
                    @method('PATCH')
                      <x-bladewind.textarea placeholder="{{__('ui.reason_for_reject')}}"  />
                        <button type="submit"class="btn btn-danger shadow">{{__('ui.reject')}}</button>
                    </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('ui.close_button_modal')}}</button>
              </div>
            </div>
          </div>
        </div>

        
   @else

   <x-bladewind.empty-state
    message="Non hai annunci da approvare">
    </x-bladewind.empty-state>
   @endif
  <script>
    window.addEventListener('DOMContentLoaded',()=>{
      let slides = document.querySelectorAll('.swiperThumbGallery2 .swiper-slide');
      let tbody = document.querySelectorAll('tbody tr')
      let imageLabels = document.querySelectorAll('.imageLabels')
      console.log(imageLabels);
      setInterval(()=>{
        slides.forEach((el,i)=>{
          if(el.classList.contains('swiper-slide-active')){
            tbody[i].classList.add('activeCustom');
            imageLabels[i].classList.remove('visually-hidden')
          }
          else{
            imageLabels[i].classList.add('visually-hidden')
            tbody[i].classList.remove('activeCustom')
          }
        })
      },0)

    })
  </script>
</x-layout>
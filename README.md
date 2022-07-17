## Da Fixare
Swiper Responsive
Logo Responsive
## Da Aggiungere
Pagina Tutti gli annunci con i filtri e la pagination

 <a href="{{route('announcement.show',$announcement)}}">
                                <div class="card bg-dark text-white position-relative w-100">
                                    <img src="https://via.placeholder.com/300" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title">{{$announcement->title}}</h5>
                                        <p class="card-text">{{$announcement->price}}</p>
                                        <p class="card-text">{{$announcement->created_at->diffForHumans()}}</p>
                                        <a href="{{route('category.show', $announcement->category)}}">
                                            <img src="{{$announcement->category->icon}}" alt="{{$announcement->category->name}}" style="width: 30px; height:30px" class="position-absolute bottom-0">
                                        </a>
                                    </div>
                                </div>
                                </a>
Aggiungere nome per categoria



$announcement= Announcement::paginate(9);
php artisan scout:flush "\App\Models\Announcement"
php artisan scout:import "\App\Models\Announcement"


  /* -webkit-mask: /*4*/
     linear-gradient(#fff 0 0) padding-box, 
     linear-gradient(#fff 0 0); */

       -webkit-mask-composite: xor; /*5'*/
          mask-composite: exclude; /*5*/


## Metodo per prendere le img dal db
$announcement->images()->first()->getUrl("Passare come primo parametro larghezza del crop", "Passare come secondo parametro l'altezza del crop") (Per ora impostato a 300x400) Se non si mette niente prende la img di default

## Quando fate il pull fate composer install, e nel file php.ini andate a decommetnare extension=exif e extension=gd altrimenti non funziona nada, per modificare il resize andate CreateAnnouncement a riga 85 e nel dispatch, quei 2 numeri alla fine, il primo è la larghezza il 2 è l'altezza
## Per far funzionare le code, dovete fare un migrate e poi dovete fare un php artisan queue:work, rimane in ascolto e quando create un annuncio croppa le immagini.

## Aggiunto metodo per le prime 4 categorie
## Da aggiungere sezione preferiti

## User 11
https://www.youtube.com/watch?v=pQf_zj7yKYM&ab_channel=SurfsideMedia


                <a href="" class="btn btn-warning">@dd(App\Models\User::countCart())</a>


<span>
@switch($categoryName)
    @case($categoryName=='per la casa')
        {{__('ui.category_house')}}
    @break

    @case($categoryName=='elettronica')
        {{__('ui.category_electronics')}}
    @break

    @case($categoryName=='moda')
        {{__('ui.category_moda')}}
    @break

    @case($categoryName=='auto e moto')
        {{__('ui.category_motors')}}
    @break

    @case($categoryName=='sport')
        {{__('ui.category_sport')}}
    @break

    @case($categoryName=='musica')
        {{__('ui.category_music')}}
    @break

    @case($categoryName=='collezionismo')
        {{__('ui.category_collecting')}}
    @break

    @case($categoryName=='libri')
        {{__('ui.category_books')}}
    @break

    @case($categoryName=='animali')
        {{__('ui.category_animals')}}
    @break

    @case($categoryName=='console e videogiochi')
        {{__('ui.category_videogames')}}
    @break


@default
@endswitch






</span>
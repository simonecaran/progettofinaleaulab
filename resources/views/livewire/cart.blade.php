<div>
    @if($contain)
    <button wire:click="setInCart" class="btn btn-secondary"><p class="text-white">Rimuovi dal carrello</p><i class="text-white bi bi-cart-dash"></i></button>
    
    @else
    <button wire:click="setInCart" class="btn btn-primary"><p class="text-white">Aggiungi al carrello</p><i class="text-white bi bi-cart-plus"></i></button>
    
    @endif
</div>

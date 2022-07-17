<div>
    @if(!$contain)
    <i wire:click="like" class="bi bi-heart fs-3" style="cursor: pointer;"></i>
        <!-- <div class="heart"></div> -->
    @else
        <i wire:click="like" class="bi fs-3 bi-heart-fill" style="cursor: pointer; color: #F62584"></i>
        <!-- <div wire:click="like" class="heart"></div> -->
    @endif
</div>

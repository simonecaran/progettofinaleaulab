<div>
    @if(!$is_sent)
    <button wire:click='sendRequest' class="btn btn-light d-flex justify-content-center align-items-center my-2">{{__('ui.click')}} <img class="ms-2" src="/img/icone/presto_icona-all.svg" alt="" width="20px"></button>
    @else
        <h2>{{__('ui.thanks')}}</h2>
        <!-- <x-bladewind.notification position="bottom right" />
        <script>
            livewire.on('sentEmail', title => {
                console.log(title);
                showNotification('Titolo',title);
            })
        </script> -->
    @endif
</div>

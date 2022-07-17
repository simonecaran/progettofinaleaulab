<x-layout>
    <!-- Search bar e categorie nel componente x-search -->
    <x-search/>
    <div class="container">
        <div class="row">
            @forelse($announcements as $announcement)
                <div class="col-12 col-md-4 my-4 d-flex justify-content-center">
                    <x-cards :announcement="$announcement"/>
                </div>
            @empty
                <div class="col-12">
                <x-bladewind.empty-state message="{{__('ui.no_announcement')}}"></x-bladewind.empty-state>
                </div>
            @endforelse
            {{$announcements->links('vendor.pagination.custom')}}
        </div>
    </div>

    <!-- @if(session('locale')=='ab')
    <script>
        window.history.pushState('','','Tutt\'/gli/annunc\'')
    </script>
@elseif(session('locale')=='it')                
    <script>
        window.history.pushState('','','casa')
    </script>
@elseif(session('locale')=='gb')
    <script>
         window.history.pushState('','','home')
    </script>
@endif -->
</x-layout>
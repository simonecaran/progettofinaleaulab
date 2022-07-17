<x-layout>
    <!-- Search bar e categorie in componente x-search -->
    <x-search/>

    <h3 class='text-center mb-5'>Annunci per la categoria {{$category_name}}</h3>
    <div class="container">
        <div class="row">
        @forelse($announcements as $announcement)
        <div class="col-12 col-md-4 my-4">
            <x-cards :announcement="$announcement"/>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-warning py-3 shadow">
                <p class="lead">Non ci sono annunci per questa ricerca. </p>
            </div>
        </div>
        @endforelse
        {{$announcements->links()}}
        </div>
    </div>

</x-layout>
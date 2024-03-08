<x-app-layout>
    <div class="flex flex-col justify-center m-4">
        <div class="flex justify-center text-3xl text-stone-300">
            <h1>{{__('¿Seguro que quiere eliminar la película "')}}{{$movie->title}}"?</h1>
        </div>
        <div class="flex justify-center gap-4 m-4">
            <form method="post" action="{{route('confirmed', $movie->id)}}">
                @csrf
                @method("delete")
                <x-button-rented>{{__('Eliminar')}}</x-button-rented>
            </form>
            <form method="get" action="{{route("index")}}">
                @csrf
                <x-primary-button>{{__('Volver')}}</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

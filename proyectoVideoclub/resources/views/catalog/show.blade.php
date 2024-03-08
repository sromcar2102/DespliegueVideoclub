<x-app-layout>
    <div class="flex justify-around m-4">
        <div class="w-full">
            <img src="{{$movie->poster}}" style="height:400px;width:100%">
        </div>
        <div class="text-stone-300 m-10">
            <h1 class="text-4xl mb-2">{{$movie->title}}</h1>
            <section class="mb-4 text-2xl">
                <h2>{{__('Año: ')}}{{$movie->year}}</h2>
                <h2>{{__('Director: ')}}{{$movie->director}}</h2>
            </section>

            <section class="mb-4">
                <p><strong class="text-xl">{{__('Resumen: ')}}</strong>{{$movie->synopsis}}</p>
            </section>

            <section class="mb-4">
                <p><strong class="text-xl">{{__('Estado: ')}}</strong>
                    @if($movie->rented)
                        {{__('Película actualmente alquilada')}}
                    @else
                        {{__('Película actualmente sin alquilar')}}
                    @endif
                </p>
            </section>
            <div class="flex gap-4">
                <form method="post" action="{{route('putRent', $movie->id)}}">
                    @csrf
                    @method("PUT")
                    @if($movie->rented)
                        <x-button-rented>{{__('Devolver')}}</x-button-rented>
                    @else
                        <x-button-rent>{{__('Alquilar')}}</x-button-rent>
                    @endif
                </form>
                <a href="{{ url('/catalog/delete/' . $movie->id ) }}">
                    <x-button-delete>{{__('Eliminar')}}</x-button-delete>
                </a>
                <a href="{{ url('/catalog/edit/' . $movie->id ) }}">
                    <x-button-edit>{{__('Editar')}}</x-button-edit>
                </a>
                <a href="{{ url('/catalog') }}">
                    <x-primary-button>{{__('Volver')}}</x-primary-button>
                </a>
                <button></button>
            </div>
        </div>
    </div>
</x-app-layout>


<x-app-layout>
    <div class="grid justify-center items-center" style="height: 80vh">
        <h1 class="font-medium text-xl text-gray-700 dark:text-gray-300">{{__('Modificando Película: ')}}{{$movie->title}}</h1>

        <form method="post" action="{{route('putEdit', $movie->id)}}">

            @csrf
            @method('PUT')
            <section class="grid justify-center">
                <x-input-label for="title">{{__('Título')}}</x-input-label>
                <x-text-input type="text" id="title" name="title" value="{{ old('title') ?? $movie->title}}"/>
                <x-input-error :messages="$errors->get('title')" ></x-input-error>

                <x-input-label for="year">{{__('Año')}}</x-input-label>
                <x-text-input type="text" id="year" name="year" value="{{ old('year')?? $movie->year }}"/>
                <x-input-error :messages="$errors->get('year')" ></x-input-error>

                <x-input-label for="director">{{__('Director')}}</x-input-label>
                <x-text-input type="text" id="director" name="director" value="{{ old('director') ?? $movie->director}}"/>
                <x-input-error :messages="$errors->get('director')" ></x-input-error>

                <x-input-label for="poster">{{__('Póster')}}</x-input-label>
                <x-text-input type="text" id="poster" name="poster" value="{{ old('poster') ?? $movie->poster}}"/>
                <x-input-error :messages="$errors->get('poster')" ></x-input-error>

                <x-input-label for="synopsis">{{__('Sinopsis')}}</x-input-label>
                <x-textarea id="synopsis" name="synopsis">{{ old('synopsis') ?? $movie->synopsis}}</x-textarea>
                <x-input-error :messages="$errors->get('synopsis')" ></x-input-error>

            </section>
            <section class="grid justify-center">
                <x-primary-button>{{__('Editar Película')}}</x-primary-button>
            </section>
        </form>
    </div>
</x-app-layout>

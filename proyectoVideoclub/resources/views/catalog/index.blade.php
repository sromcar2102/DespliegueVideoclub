<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold leading-tight text-white">
            {{__('Catalog')}}
            @if (session('feedback'))
                {{ session('feedback') }}
            @endif
        </h2>
    </x-slot>
    <div class="grid grid-cols-4">
        @foreach($movies as $movie)
            <a href="{{ url('/catalog/show/' . $movie->id ) }}">
                <div class="flex flex-col bg-slate-800 m-4">
                    <img src="{{$movie->poster}}" style="height:350px"/>
                    <h4 class="min-h-11 m-2 text-stone-300">
                        {{$movie->title}}
                    </h4>
                </div>
            </a>
        @endforeach
    </div>
</x-app-layout>

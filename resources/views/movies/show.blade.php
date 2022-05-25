<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            #{{ $movie->id }} {{ $movie->title }} ({{ $movie->year }})
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        <img src="{{ $movie->photo_url }}" alt="{{ $movie->title }}">
                    </div>
                    <div>{{ __('Director') }}: {{ $movie->director }}</div>

                    <div class="text-xs">{{ $movie->description }}</div>

                    @if($movie->usersFavored()->first())
                        <a href="{{ route('movies:remove-from-favourite', ['id' => $movie->id]) }}">{{ __('Remove as favourite') }}</a>
                    @else
                        <a href="{{ route('movies:add-to-favourite', ['id' => $movie->id]) }}">{{ __('Add as favourite') }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

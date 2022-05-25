<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-5">
                        {{ $list->links() }}
                    </div>
                    <div class="grid grid-cols-4 gap-4 mb-5">
                        @foreach ($list as $item)
                            <div class="card">
                                <div>
                                    <h4>#{{ $item->id }} {{ $item->title }} ({{ $item->year }})</h4>
                                </div>
                                <div>
                                    <img src="{{ $item->photo_url }}" alt="{{ $item->title }}">
                                </div>
                                <div>{{ __('Director') }}: {{ $item->director }}</div>

                                <div class="text-xs">{{ Str::limit($item->description, 50) }}</div>

                                <a href="{{ route('movies:show', ['id' => $item->id]) }}">Show details</a>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

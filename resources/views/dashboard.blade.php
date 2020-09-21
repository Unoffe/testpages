<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($posts as $post)
                    <div class="box bg-gray-50 overflow-hidden shadow-xl sm:rounded-md">
                        {{ $post->title }}<br>
                        {!! $post->description !!}<br>
                        Автор: {{ $post->user->name }}<br>
                    </div>

                    <br>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

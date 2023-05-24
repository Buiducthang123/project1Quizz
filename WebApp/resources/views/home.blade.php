

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trac Nghiem Online ') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($tests as $item)
                <div class="h-16 bg-red-500 mb-4 sm:rounded-lg text-center  "><a class="text-white " style="line-height: 4rem" href="{{ route('test_question', ['id'=>$item->id]) }}">{{$item->Name}}</a></div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
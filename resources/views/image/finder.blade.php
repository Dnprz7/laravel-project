<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('dashboard') }}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Photogram') }}
            </h2>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-2 sm:p-4 bg-white shadow sm:rounded-lg inline-flex">
                <form method="get" action="{{ route('images') }}" id="finder">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" id="search" class="form-control" />
                        </div>
                        <div class="form-group col btn-search">
                            <input type="submit" value="Search" />
                        </div>
                    </div>
                </form>
            </div>

            <div id="search-results-info" class="p-1 mb-2 bg-gray-100 sm:rounded-lg"></div>

            @foreach ($images as $image)
                @include('includes.image', ['image' => $image])
            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="clearfix"></div>
        <div class="mt-8 flex justify-center">
            {{ $images->links('pagination::tailwind') }}
        </div>
    </div>
</x-app-layout>

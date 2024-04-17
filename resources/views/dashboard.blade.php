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

            <form method="get" action="{{ route('dashboard', ['sort_by' => '']) }}">
                @csrf
                <select name="sort_by">
                    <option value="default" selected>- Selection -</option>
                    <option value="likes">Most popular</option>
                    <option value="dislikes">Less popular</option>
                    <option value="comments">Most comments</option>
                    <option value="recent">Recent</option>
                    <option value="oldest">Old</option>
                </select>
                <button type="submit">Filter</button>
            </form>

            @if (session('status') === 'post-created')
                <div class="max-w-xl flex items-center">
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                        class="bg-green-500 text-white font-semibold py-1 px-2 rounded-lg shadow-md">
                        {{ __('Post Created') }}
                    </div>
                </div>
            @endif

            @if (session('status') === 'image-deleted')
                <div class="max-w-xl flex items-center">
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                        class="bg-green-500 text-white font-semibold py-1 px-2 rounded-lg shadow-md">
                        {{ __('Image Deleted') }}
                    </div>
                </div>
            @elseif (session('status') === 'image-not-deleted')
                <div class="max-w-xl flex items-center">
                    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2500)"
                        class="bg-red-500 text-white font-semibold py-1 px-2 rounded-lg shadow-md">
                        {{ __('Image not Deleted') }}
                    </div>
                </div>
            @endif

            @foreach ($images as $image)
                @include('includes.image', ['image' => $image])
            @endforeach

            {{-- PAGINATION
            <div class="clearfix"></div>
            <div class="mt-8 flex justify-center">
                {{ $images->links('pagination::tailwind') }}
            </div> --}}
        </div>
    </div>



</x-app-layout>

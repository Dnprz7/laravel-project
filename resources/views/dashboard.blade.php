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

            <div class="p-2 sm:p-4 shadow sm:rounded-lg inline-flex">
                <form id="search-form" method="get" action="{{ route('dashboard') }}">
                    @csrf
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" name="search" id="search" class="form-control"
                                value="{{ $search }}" placeholder="Tag" />
                        </div>
                        <div class="form-group col pt-1">
                            <select name="sort_by" class="form-control w-full">
                                <option value="default" {{ $sortBy == 'default' ? 'selected' : '' }}>- Filter -</option>
                                <option value="likes" {{ $sortBy == 'likes' ? 'selected' : '' }}>Most popular</option>
                                <option value="dislikes" {{ $sortBy == 'dislikes' ? 'selected' : '' }}>Less popular
                                </option>
                                <option value="comments" {{ $sortBy == 'comments' ? 'selected' : '' }}>Most comments
                                </option>
                                <option value="recent" {{ $sortBy == 'recent' ? 'selected' : '' }}>Recent</option>
                                <option value="oldest" {{ $sortBy == 'oldest' ? 'selected' : '' }}>Oldest</option>
                            </select>
                        </div>
                        <div class="form-group col pt-2">
                            <x-secondary-button type="submit">Search</x-secondary-button>
                        </div>
                    </div>
                </form>
            </div>

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

            {{-- PAGINATION --}}
            <div class="clearfix"></div>
            <div class="mt-8 flex justify-center">
                {{ $images->links('pagination::tailwind') }}
            </div>
        </div>
    </div>



</x-app-layout>

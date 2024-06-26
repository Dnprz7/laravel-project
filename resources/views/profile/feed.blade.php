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

            <div class="sm:rounded-lg flex items-center">

                @if ($user->image)
                    <div class="mr-1">
                        <img src="{{ route('profile.avatar', ['filename' => $user->image]) }}" alt="Profile Photo"
                            class="max-w-40  rounded-full">
                    </div>
                @else
                    <div x-show="defaultAvatarPreview" class="mr-1">
                        <img src="{{ asset('img/defaultprofile.png') }}" alt="Default Photo"
                            class="max-w-40  rounded-full">
                    </div>
                @endif

                <div class="ml-4">
                    <p class="text-3xl">
                        {{ __('@' . $user->nick) }}
                    </p>
                    <p>
                        {{ $user->name . ' ' . $user->surname }}
                    </p>
                    <p class="text-sm text-gray-600">
                        {{ 'Joined: ' . $user->created_at->diffForHumans(null, false, false, 1) }}
                    </p>
                </div>
            </div>

            @foreach ($user->images()->orderBy('created_at', 'desc')->get() as $image)
                @include('includes.image', ['image' => $image])
            @endforeach

        </div>
    </div>
</x-app-layout>

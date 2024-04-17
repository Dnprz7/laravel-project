<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('dashboard') }}">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Photogram') }}
            </h2>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Upload a Photo') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __('Add a new Photo with a comment') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('image.save') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="flex flex-col" x-data="{ imagePreview: '' }">
                                <label for="image_path" class="text-sm text-gray-700">Photo</label>
                                <input type="file" name="image_path" id="image_path" class="mt-1" required
                                    x-on:change="imagePreview = URL.createObjectURL($event.target.files[0])"
                                    accept="image/*">
                                <div x-show="imagePreview">
                                    <img :src="imagePreview" alt="Preview" class="mt-2 ">
                                </div>

                                @if ($errors->has('image_path'))
                                    <span class="invalid-feedback" role"alert">
                                        <strong>{{ $errors->first('image_path') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="flex flex-col">

                                <label for="description" class="text-sm text-gray-700">Description</label>
                                <textarea name="description" id="description"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    required> </textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role"alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="flex flex-col">

                                <x-input-label for="tag" :value="__('Add a tag to your photo so people can search it')" />
                                <x-text-input id="tag" name="tag" type="text" class="mt-1 block w-full" />
                                <x-input-error class="mt-2" :messages="$errors->get('tag')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>

                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Edit product</h2>
                        <p class="text-gray-600 mb-10">Modify an existing product.</p>

                        @if(session('success'))
                            <div class="bg-green-100 text-green-800 p-2 rounded mt-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="block mt-1 w-full h-32" required>{{ old('description', $product->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="amount" :value="__('Amount')" />
                                <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount', $product->amount)" required />
                                <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="price" :value="__('Price')" />
                                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price', $product->price)" required />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <div class="mb-4">
                                <x-input-label :value="__('Current image')" />
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mb-2">
                                @endif
                            </div>

                            <div class="mb-4">
                                <x-input-label for="image" :value="__('New image')" />
                                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
                                <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            </div>

                            <div class="text-end">
                                <x-primary-button>
                                    {{ __('Save changes') }}
                                </x-primary-button>
                            </div>
                        </form>

                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
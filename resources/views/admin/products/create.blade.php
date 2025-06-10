<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Add product</h2>
                        <p class="text-gray-600 mb-10">Fill out the form to add a new product.</p>

                        @if(session('success'))
                            <div class="bg-green-100 text-green-800 p-2 rounded mt-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                            <!-- Forma za dodavanje proizvoda -->
                            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                @csrf

                                <!-- Naziv -->
                                <div>
                                    <x-input-label for="name" :value="__('Naziv')" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Opis -->
                                <div>
                                    <x-input-label for="description" :value="__('Opis')" />
                                    <textarea id="description" name="description" required
                                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm text-gray-900 placeholder-gray-400 h-32 resize-none">{{ old('description') }}</textarea>
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                </div>

                                <!-- Količina -->
                                <div>
                                    <x-input-label for="amount" :value="__('Količina')" />
                                    <x-text-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount')" required />
                                    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
                                </div>

                                <!-- Cena -->
                                <div>
                                    <x-input-label for="price" :value="__('Cena')" />
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>

                                <!-- Slika -->
                                <div>
                                    <x-input-label for="image" :value="__('Slika')" />
                                    <input id="image" type="file" name="image" class="block mt-1 w-full" />
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>

                                <!-- Submit -->
                                <div class="text-end">
                                    <x-primary-button>
                                        {{ __('Save') }}
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
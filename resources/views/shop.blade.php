<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shop') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($products as $product)
                        <div class="flex flex-wrap justify-center">
                            <div class="max-w-sm rounded overflow-hidden shadow-lg mb-4 mx-2">
                                <img class="w-full" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product['name'] }}">
                                <div class="px-6 py-4">
                                    <div class="font-bold text-xl mb-2 text-center">{{ $product['name'] }}</div>
                                    <p class="text-gray-700 text-base text-center">
                                        {{ $product['description'] }}
                                    </p>
                                </div>
                                <div class="px-6 pt-4 pb-2 flex flex-col items-center">
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-2">
                                        Amount: {{ $product['amount'] }}
                                    </span>
                                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mb-2">
                                        ${{ $product['price'] }}
                                    </span>
                                    <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Add to Cart
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
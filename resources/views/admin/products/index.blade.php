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
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">Naziv</th>
                                <th class="py-2 px-4 border-b">Opis</th>
                                <th class="py-2 px-4 border-b">Količina</th>
                                <th class="py-2 px-4 border-b">Cena</th>
                                <th class="py-2 px-4 border-b">Slika</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $product->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                                    <td class="py-2 px-4 border-b">{{ $product->amount }}</td>
                                    <td class="py-2 px-4 border-b">${{ $product->price }}</td>
                                    <td class="py-2 px-4 border-b">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="80">
                                        @else
                                            Nema slike
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
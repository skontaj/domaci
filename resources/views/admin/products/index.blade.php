<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (session('success'))
                    <div class="p-4">
                        <div class="bg-green-100 text-green-800 p-2 rounded">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b">ID</th>
                                <th class="py-2 px-4 border-b">Name</th>
                                <th class="py-2 px-4 border-b">Description</th>
                                <th class="py-2 px-4 border-b">Amount</th>
                                <th class="py-2 px-4 border-b">Price</th>
                                <th class="py-2 px-4 border-b">Image</th>
                                <th class="py-2 px-4 border-b">Actions</th>
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
                                    <td class="py-2 px-4 border-b">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                                            <form action="{{ route('admin.products.delete', $product->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                                            </form>
                                        </div>
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
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Contacts') }}
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
                                <th class="py-2 px-4 border-b">Email</th>
                                <th class="py-2 px-4 border-b">Subject</th>
                                <th class="py-2 px-4 border-b">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $contact->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $contact->email }}</td>
                                    <td class="py-2 px-4 border-b">{{ $contact->subject }}</td>
                                    <td class="py-2 px-4 border-b">{{ $contact->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit contact') }}
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
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Edit contact</h2>

                    <form method="POST" action="{{ route('admin.contacts.update', $contact->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $contact->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="subject" :value="__('Subject')" />
                            <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject', $contact->subject)" required />
                            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="message" :value="__('Message')" />
                            <textarea id="message" name="message" class="block mt-1 w-full h-40" required>{{ old('message', $contact->message) }}</textarea>
                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
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
</x-app-layout>
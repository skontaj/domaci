<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

                        <h2 class="text-3xl font-bold text-gray-800 mb-4">Contact us</h2>
                        <p class="text-gray-600 mb-10">Have a question? Send us a message via the form or visit us at the location below.</p>

                        @if (session('success'))
                            <div class="bg-green-100 text-green-800 p-2 rounded mt-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

                            <!-- Contact form -->
                            <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                                @csrf

                                <!-- Email -->
                                <div>
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Subject -->
                                <div>
                                    <x-input-label for="subject" :value="__('Subject')" />
                                    <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" :value="old('subject')" required />
                                    <x-input-error :messages="$errors->get('subject')" class="mt-2" />
                                </div>

                                <!-- Message -->
                                <div>
                                    <x-input-label for="message" :value="__('Message')" />
                                    <textarea id="message" name="message" required
                                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm text-gray-900 placeholder-gray-400 h-32 resize-none">
                                        {{ old('message') }}
                                    </textarea>
                                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                                </div>

                                <!-- Submit -->
                                <div class="text-end">
                                    <x-primary-button>
                                        {{ __('Send Message') }}
                                    </x-primary-button>
                                </div>
                            </form>

                            <!-- Informacije i mapa -->
                            <div class="space-y-6 lg:mt-10">
                                <div class="bg-gray-100 p-6 rounded-md shadow">
                                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-2">Contact information</h3>
                                    <p class="text-gray-600"><strong>Address:</strong> Ulica bb, 11000 Beograd</p>
                                    <p class="text-gray-600"><strong>Phone:</strong> +381 11 123456</p>
                                    <p class="text-gray-600"><strong>Email:</strong> kontakt@firma.rs</p>
                                </div>

                                <div class="w-full h-64 rounded-md overflow-hidden shadow">
                                    <!-- Google mapa -->
                                    <iframe class="w-full h-full"
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.246016189021!2d20.4572734155421!3d44.8154039790984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a705f2a7d3cbb%3A0x65ce9fcbfe23c9e6!2sBeograd!5e0!3m2!1sen!2srs!4v1622222523615!5m2!1sen!2srs"
                                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
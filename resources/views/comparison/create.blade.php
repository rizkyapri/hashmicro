<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{ route('comparison.store') }}" method="POST">
                    @csrf
                    <!-- Input 1 -->
                    <x-input-label for="teks1" :value="__('Masukkan Huruf')" />
                    <x-text-input id="text" class="block mt-1 w-full" type="text" name="input1" :value="old('input1')"
                        required autofocus autocomplete="huruf" />
                    <x-input-error :messages="$errors->get('input1')" class="mt-2" />
                    <br>
                    {{-- Input 2 --}}
                    <x-input-label for="teks2" :value="__('Kata')" />
                    <x-text-input id="text" class="block mt-1 w-full" type="text" name="input2"
                        :value="old('input2')" required autofocus autocomplete="kata" />
                    <x-input-error :messages="$errors->get('input2')" class="mt-2" />

                    <x-primary-button class="mt-3">
                        {{ __('Save') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

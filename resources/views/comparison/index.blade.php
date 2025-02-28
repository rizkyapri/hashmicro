<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <x-secondary-button>
                    <a href="{{ route('comparison.create') }}">Tambah Data</a>
                </x-secondary-button>

                <div class="overflow-x-auto mt-4">
                    <table
                        class="w-full border-collapse border border-gray-300 dark:border-gray-700 text-sm text-left text-gray-600 dark:text-gray-200">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-300">
                            <tr>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">No</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Input 1</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Input 2</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Hasil (%)</th>
                                <th class="border border-gray-300 dark:border-gray-600 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comparisons as $comparison)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center">
                                        {{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                                        {{ $comparison->input1 }}</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2">
                                        {{ $comparison->input2 }}</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 text-center">
                                        {{ $comparison->percentage }}%</td>
                                    <td class="border border-gray-300 dark:border-gray-600 px-4 py-2 flex justify-center">
                                        {{-- @dd($comparison) --}}
                                        <form action="{{ route('comparison.destroy', $comparison->id) }}" method="POST"
                                            class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="p-6 text-gray-900">
                        <form method="POST" action="{{ route('sertifikat.store.users', $sertifikat->id) }}">
                            @csrf


                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="users">Users</label>
                                <textarea name="users" id="users"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="sebagai">sebagai</label>
                                <select name="sebagai" id="sebagai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                                    <option value="peserta">Peserta</option>
                                    <option value="panitia">Panitia</option>
                                    <option value="moderator">Moderator</option>
                                    <option value="ketua">Ketua</option>
                                </select>
                            </div>


                            <div>
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
</x-app-layout>

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
                    <div class="table-responsive">
                    

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Sertifikat ID') }}</th>
                                <th>{{ __('Sertifikat Name') }}</th>
                                
                                <th>{{ __('QR Code') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sertifikats as $sertifikat)
                                <tr>
                                    <td>{{ $sertifikat->id }}</td>
                                    <td>
    <a href="{{route('sertifikat.show', $sertifikat->id)}}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
        {{ $sertifikat->name }}
    </a>
</td>
                                        <td><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $sertifikat->name }}" alt=""></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

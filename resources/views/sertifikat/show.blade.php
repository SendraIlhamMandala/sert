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
                                    <th>{{ __('url') }}</th>
                                    <th>{{ __('QR Code') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $sertifikat->id }}</td>
                                        <td>{{ $sertifikat->name }}</td>
                                        <td>{{ $sertifikat->url_qrcode }}</td>
                                        <td> <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ $sertifikat->url_qrcode }}" alt=""></td>
                                    </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

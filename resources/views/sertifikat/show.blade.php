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
                    <div class="table-responsive">

                        <div class="bg-white rounded overflow-hidden shadow-lg p-6 mx-4 my-4">
                            <div class="font-bold text-xl mb-2">{{ $sertifikat->name }}</div>
                            <p class="text-gray-700 text-base">{{ $sertifikat->keterangan }}</p>
                            <p class="text-gray-700 text-base">{{ $sertifikat->tanggal }}</p>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('Sertifikat ID') }}</th>
                                    <th>{{ __('Sertifikat Name') }}</th>
                                    <th>{{ __('QR Code') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $sertifikat->id }}</td>
                                        <td>{{ $sertifikat->name }}</td>
                                        <td> <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{request()->getHttpHost()}}/sertifikat/{{ $sertifikat->id }}" alt=""></td>
                                    </tr>
                            </tbody>
                        </table>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>{{ __('User ID') }}</th>
                                    <th>{{ __('User Name') }}</th>
                                    <th>{{ __('User Email') }}</th>
                                    <th>{{ __('Download Sertifikat') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sertifikat->users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><a href="{{ route('sertifikat.download', $user->id.'-'.$sertifikat->id) }}" target="_blank">Download</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

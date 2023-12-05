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

                    <div class="bg-white rounded overflow-hidden shadow-lg p-6 mx-4 my-4">
                        <div class="font-bold text-xl mb-2">{{ $sertifikat->name }}</div>
                        <p class="text-gray-700 text-base">{{ $sertifikat->keterangan }}</p>
                        <p class="text-gray-700 text-base">{{ $sertifikat->tanggal }}</p>
                    </div>

                    <a href="{{ route('sertifikat.addusers', $sertifikat->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Add Users
                    </a>


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
                                    <th>{{ __('User sebagai') }}</th>
                                    <th>{{ __('Download Sertifikat') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sertifikat->users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{  DB::table('user_sertifikats')
                                            ->where('user_id', $user->id)
                                            ->where('sertifikat_id', $sertifikat->id)
                                            ->get()
                                            ->first()->sebagai }}</td>
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

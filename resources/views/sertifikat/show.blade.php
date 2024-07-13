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

                    {{-- <div class="bg-white rounded overflow-hidden shadow-lg p-6 mx-4 my-4">
                        <div class="font-bold text-xl mb-2">{{ $sertifikat->name }}</div>
                        <p class="text-gray-700 text-base">{{ $sertifikat->keterangan }}</p>
                        <p class="text-gray-700 text-base">{{ $sertifikat->tanggal }}</p>
                    </div> --}}

                    

<div class="w-full p-4 mb-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">{{ $sertifikat->name }}</h5>
    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">{{ $sertifikat->keterangan }}</p>
    <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400">{{ $sertifikat->tanggal }}</p>
    <img class="rounded-lg mx-auto " height="100" width="100" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{request()->getHttpHost()}}/sertifikat/{{ $sertifikat->id }}" alt="">
</div>


                    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    No. 
                </th>
                <th scope="col" class="px-6 py-3">
                    User Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Sebagai 
                </th>
                <th scope="col" class="px-6 py-3">
                    Download
                </th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($sertifikat->users as $user)
            
            
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $loop->iteration }}
                </th>
                <td class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $user->name }}
                </td>
                <td class="px-6 py-4">
                    {{  DB::table('user_sertifikats')
                    ->where('user_id', $user->id)
                    ->where('sertifikat_id', $sertifikat->id)
                    ->get()
                    ->first()->sebagai }}                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('sertifikat.download', $user->id.'-'.$sertifikat->id) }}" target="_blank">Download</a>
                </td>
            </tr>
    
            @endforeach
        </tbody>
    </table>
</div>


                 

                    <div class="table-responsive">

                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" >

                            <a href="{{ route('sertifikat.addusers', $sertifikat->id) }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Add Users
                            </a>
        
                            <a href="/sertifikat/{{ $sertifikat->id }}/edit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-700 focus:outline-none focus:border-green-700 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Edit Sertifikat
                            </a>
                        </div>
                   


                </div>
            </div>
        </div>
    </div>
</x-app-layout>

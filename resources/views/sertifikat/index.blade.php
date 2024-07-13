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
                    
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg" >

                            <a href="{{ route('sertifikat.create') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-700">
                                {{ __('Create New Sertifikat') }}
                            </a>
                        </div>
                    <table class="table" id="example" >
                        <thead>
                            <tr>
                                <th>{{ __('Sertifikat ID') }}</th>
                                <th>{{ __('Sertifikat Name') }}</th>
                                <th>{{ __('Tanggal') }}</th>
                                <th>{{ __('QR Code') }}</th>
                                <th>{{ __('Aksi') }}</th>
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
                                    <td>{{ \Carbon\Carbon::parse($sertifikat->tanggal)->format('d F Y') }}</td>
                                        <td>
    <a href="#" class="download-qr" data-name="{{request()->getHttpHost()}}/sertifikat/{{ $sertifikat->id }}">
    <img height="50" width="50" src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{request()->getHttpHost()}}/sertifikat/{{ $sertifikat->id }}" alt="QR Code">
</a>
</td>
<td class="flex items-center justify-end space-x-2">
    <a href="{{ route('sertifikat.edit', $sertifikat->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-700">
        {{ __('Edit') }}
    </a>
    <form method="POST" action="{{ route('sertifikat.destroy', $sertifikat->id) }}" onsubmit="return confirm('{{ __('Are you sure you want to delete this sertifikat?') }}');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
            {{ __('Delete') }}
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.download-qr').forEach(function (element) {
                element.addEventListener('click', function (e) {
                    e.preventDefault();
                    var name = e.target.closest('a').dataset.name;
                    var url = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${name}`;
                    fetch(url)
                        .then(response => response.blob())
                        .then(blob => {
                            var link = document.createElement('a');
                            link.href = window.URL.createObjectURL(blob);
                            link.download = `${name}-QRCode.png`;
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        })
                        .catch(() => alert('Could not download the QR code'));
                });
            });
        });
        </script>
        
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        $('#example').DataTable({
            "order": [] // Assuming the date is in the 4th column (0-indexed)
        });
    </script>
</x-app-layout>

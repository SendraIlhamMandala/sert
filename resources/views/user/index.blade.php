<x-app-layout>

    <div class="container mx-auto flex justify-center">
    <div class="w-full max-w-6xl">
        <div class="bg-white shadow-md rounded my-6">
            <table id="example" >
    <thead>
        <tr>
            <th class="px-4 py-2 text-gray-600">ID</th>
            <th class="px-4 py-2 text-gray-600">Name</th>
            <th class="px-4 py-2 text-gray-600">Email</th>
            <th class="px-4 py-2 text-gray-600">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="border px-4 py-2">{{ $user->id }}</td>
                <td class="border px-4 py-2">{{ $user->name }}</td>
                <td class="border px-4 py-2">{{ $user->email }}</td>
                <td class="border px-4 py-2">
                    <div class="flex flex-row gap-4">
                        <div class="flex-1">
                            <a href="{{ route('users.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 ">Edit</a>
                        </div>
                        <div class="flex-1">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="confirmDeletion(event,{{ $user->id }},'{{ $user->name }}')">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

 

                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">


    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>

    <script>
        function confirmDeletion(event, id, name) {
            event.preventDefault();
            const modal = document.createElement('div');
            modal.style.position = 'fixed';
            modal.style.left = '0';
            modal.style.top = '0';
            modal.style.width = '100%';
            modal.style.height = '100%';
            modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
            modal.style.display = 'flex';
            modal.style.justifyContent = 'center';
            modal.style.alignItems = 'center';
            modal.style.zIndex = '1000';
    
            const modalContent = document.createElement('div');
            modalContent.style.width = '300px';
            modalContent.style.padding = '20px';
            modalContent.style.backgroundColor = '#fff';
            modalContent.style.borderRadius = '5px';
            modalContent.style.textAlign = 'center';
            modalContent.innerHTML = `
                <h2 class="text-xl font-bold text-red-600">Confirm Deletion</h2>
                <p class="text-gray-700">Are you sure you want to delete this user?</p>
                <p class="text-red-600 font-bold text-lg " style="font-size: 30px;" >`+ name +`</p>
                <div class="flex justify-end mt-4">
                    <button id="confirmDeletion" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Yes, Delete</button>
                    <button id="cancelDeletion" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">Cancel</button>
                </div>
            `;
    
            document.body.appendChild(modal);
            modal.appendChild(modalContent);
    
            modal.querySelector('#confirmDeletion').onclick = function() {
                document.body.removeChild(modal);
                event.target.form.action = "{{ route('users.destroy', ':id') }}".replace(':id', id);
                // console.log( event.target.form);
                event.target.form.submit();
            };
    
            modal.querySelector('#cancelDeletion').onclick = function() {
                document.body.removeChild(modal);
            };
        }
    </script>

</x-app-layout>
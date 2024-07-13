<x-app-layout>

<div class="container mx-auto p-6">
    <div class="flex justify-center">
        <div class="w-full max-w-xs">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <h1 class="text-gray-900 font-bold text-xl mb-2">{{ $user->name }}'s Profile</h1>
                </div>
                <div class="mb-6">
                    <p><strong>ID:</strong> {{ $user->id }}</p>
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Created At:</strong> {{ $user->created_at->toFormattedDateString() }}</p>
                    <p><strong>Updated At:</strong> {{ $user->updated_at->toFormattedDateString() }}</p>
                </div>
                <div class="flex items-center justify-between">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Edit
                    </a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
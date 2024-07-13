<x-app-layout>

    <div class="container">
   
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl my-6">
            
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Edit {{ $user->name }}</div>
                    
                    <div class="flex justify-center align-middle center ">
    <form method="POST" action="{{ route('users.update', $user->id) }}" class="space-y-6">
        @csrf
                        @method('PUT')

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Name') }}
                            </label>

                            <input id="name" type="text" class="form-input w-full" name="name"
                                value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus
                                @error('name') border-red-500 @enderror>

                            @error('name')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('E-Mail Address') }}
                            </label>

                            <input id="email" type="email" class="form-input w-full" name="email"
                                value="{{ old('email', $user->email) }}" required autocomplete="email"
                                @error('email') border-red-500 @enderror>

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full sm:w-1/2 sm:px-3">
                                <button type="submit"
                                    class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
                    
             
    </div>

</x-app-layout>

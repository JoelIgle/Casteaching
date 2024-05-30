<x-casteaching-layout>

@can('users_manage_edit')
        <form data-qa="form_user_edit" action="" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-white/10 pb-12 m-6">
                <h2 class="text-base font-semibold leading-7 text-white">Edit User "{{ $user->name }}"</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <div class="sm:col-span-3">
                        <label for="name" class="block text-sm font-medium leading-6 text-white">Name</label>
                        <div class="mt-2">
                            <input value="{{$user->name}}" type="text" required name="name" id="name" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <br>

                    <div class="sm:col-span-3">
                        <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
                        <div class="mt-2">
                            <input  required  type="email" name="email" value="{{ $user->email }}" id="email" class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                        </div>
                    </div>


                    <div class="sm:col-span-4">
                        <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
                        <div class="mt-2">
                            <div class="flex rounded-md bg-gray-700 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                <input  value="{{ $user->password }}" type="password" required name="password" id="password" class="flex-1 border-0 bg-gray-600 py-1.5 pl-1 text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Youtube...">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="{{ route('users.manage.index') }}"><button type="button" class="text-sm font-semibold leading-6 text-white">Cancel·lar</button></a>
            <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Modificar</button>
        </div>
    </form>
@endcan

</x-casteaching-layout>

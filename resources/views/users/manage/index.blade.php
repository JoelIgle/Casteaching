<x-casteaching-layout>
    @if(session()->has('status'))
        <div x-data="{ hidden: false }" class="rounded-md bg-green-50 p-4" :class="{'hidden': hidden, 'block': ! hidden }">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('status') }}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button @click="hidden = ! hidden" type="button" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                            <span class="sr-only">Dismiss</span>
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

        @can('users_manage_create')
            <form data-qa="form_user_create" action="" method="POST">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-white/10 pb-12 m-6">
                        <h2 class="text-base font-semibold leading-7 text-gray-800">Create Users</h2>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                            <div class="sm:col-span-3">
                                <label for="name" class="block text-sm font-medium leading-6 text-gray-800">Name</label>
                                <div class="mt-2">
                                    <input type="text" required name="name" id="name" class="block w-full rounded-md border-0 bg-white py-1.5 text-gray-800 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                </div>
                            </div>
                            <br>

                            <div class="sm:col-span-3">
                                <label for="email" class="block text-sm font-medium leading-6 text-gray-800">Email</label>
                                <div class="mt-2">
                                    <input  required  type="email" name="email" id="email" class="block w-full rounded-md border-0 bg-white py-1.5 text-gray-800 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                                </div>
                            </div>


                            <div class="sm:col-span-4">
                                <label for="password" class="block text-sm font-medium leading-6 text-gray-800">Password</label>
                                <div class="mt-2">
                                    <div class="flex rounded-md bg-white ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                        <input type="password" required name="password" id="password" class="flex-1 border-0 bg-white py-1.5 pl-1 text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Guardar</button>
                </div>
            </form>
        @endcan



    <div class="">
        <div class="mx-auto max-w-7xl">
            <div class=" py-10">
                <div class="px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-800">Users</h1>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <button type="button" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Add user</button>
                        </div>
                    </div>
                    <div class="mt-8 flow-root">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <table class="min-w-full divide-y divide-gray-700">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-800 sm:pl-0">Id</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-800">Name</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-800">Email</th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-800">Password</th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-800">
                                    @foreach($users as $user)
{{--                                        @if($loop->even)--}}
{{--                                            <tr class="bg-white">--}}
{{--                                        @else--}}
{{--                                            <tr class="bg-gray-600"></tr>--}}
{{--                                        @endif--}}
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-800 sm:pl-0">{{ $user->id }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $user->name }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-600">{{ $user->password }}</td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="/manage/users/{{$user->id}}" target="_blank" class="text-indigo-400 hover:text-indigo-300">Edit</a>
                                            <form action="/manage/users/{{$user->id}}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')

                                                <a href="/users/{{$user->id}}" class="text-indigo-400 hover:text-indigo-300"
                                                   onclick="event.preventDefault(); this.closest('form').submit();">
                                                    Delete
                                                </a>
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
            </div>
        </div>
    </div>


</x-casteaching-layout>

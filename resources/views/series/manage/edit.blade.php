<x-casteaching-layout>

    @can('series_manage_create')
        <form data-qa="form_serie_edit" action="" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="space-y-12">
                <div class="border-b border-white/10 pb-12 m-6">
                    <h2 class="text-base font-semibold leading-7 text-gray-800">Edit Serie "{{ $serie->title }}"</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-3">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-800">Title</label>
                            <div class="mt-2">
                                <input value="{{$serie->title}}" type="text" required name="title" id="title" class="block w-full rounded-md border-0 bg-gray-100 py-1.5 text-gray-800 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <br>

                        <div class="sm:col-span-3">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-800">Description</label>
                            <div class="mt-2">
                                <textarea cols="30" required rows="10" type="text" name="description" id="description" class="block w-full rounded-md border-0 bg-gray-100 py-1.5 text-gray-800 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">{{ $serie->description }}</textarea>
                            </div>
                        </div>


                        <div class="sm:col-span-3">
                            <label for="image" class="block text-sm font-medium text-gray-700">
                                Image
                            </label>
                            <div class="mt-1">
                                <input required type="file" id="image" name="image" class="shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">
                                Upload an image for the series
                            </p>
                        </div>



                    </div>
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('manage.series') }}"><button type="button" class="text-sm font-semibold leading-6 text-gray-800">Cancel·lar</button></a>
                <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Modificar</button>
            </div>
        </form>
    @endcan

</x-casteaching-layout>

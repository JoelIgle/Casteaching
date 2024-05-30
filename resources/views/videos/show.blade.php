<x-casteaching-layout>
    <div class="text-white flex flex-col h-screen">
        @if($video)
            <iframe
                class="md:p-3 lg:p-5 xl:p-10 2xl:p-20 h-4/5"
                src="{{ $video->url }}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
            </iframe>

            <div class="border-b border-gray-200 bg-white px-4 py-5 sm:px-6">
                <h3 class="text-base font-semibold leading-6 text-gray-900">{{ $video->title }}</h3>
                <p class="text-sm font-semibold leading-6 text-gray-900"> {{ $video->formatted_published_at }} </p>
                <p class="mt-1 text-sm text-gray-500">{{ $video->description }}</p>
            </div>

            <div class="p-4 lg:p-5 xl:p-10 2xl:p-20">
                <div>

                </div>
                <div>

    {{--                <li>{{ $video->published_at }}</li>--}}
                </div>
            </div>

        @else
            <p>Video not found.</p>
        @endif
    </div>
</x-casteaching-layout>




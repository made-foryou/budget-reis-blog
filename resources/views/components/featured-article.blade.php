<article class="relative isolate flex flex-col justify-end
                overflow-hidden
                rounded-2xl bg-gray-900 px-8 pb-8 pt-80
                transition duration-100 ease-in-out
                hover:shadow-xl
                sm:pt-48
                lg:pt-80">
    <img src="{{ $post->getFirstMediaUrl('featured') }}" alt="{{ $post->title }}" class="absolute inset-0 -z-10 h-full w-full object-cover">
    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

    <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
        <time datetime="{{ $post->created_at->format('Y-m-d') }}" class="mr-8">{{ $post->created_at->diffForHumans() }}</time>
        <div class="-ml-4 flex items-center gap-x-4">
            <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
                <circle cx="1" cy="1" r="1" />
            </svg>
            <div class="flex gap-x-2.5">
                <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-6 w-6 flex-none rounded-full bg-white/10">
                {{ $post->user?->name }}
            </div>
        </div>
    </div>
    <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
        <a href="{{ url($post->route->route) }}">
            <span class="absolute inset-0"></span>
            {{ $post->title }}
        </a>
    </h3>
</article>

<div class="bg-white py-12 sm:py-20">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                {{ $title }}
            </h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">
                {{ $description ?? '' }}
            </p>
        </div>
        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($posts as $post)
                <x-article :post="$post"></x-article>
            @endforeach
        </div>
    </div>
</div>

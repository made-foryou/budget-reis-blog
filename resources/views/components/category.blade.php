@if ($first)
    <div class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:relative sm:aspect-h-1 sm:aspect-w-1 sm:row-span-2">
        <img src="{{ $category->getFirstMediaUrl('featured') }}"
             alt="{{ $category->meta->title }}"
             class="object-cover h-full object-center group-hover:opacity-75">
        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0"></div>
        <div class="flex items-end p-6 sm:absolute sm:inset-0">
            <div>
                <h3 class="font-semibold text-white">
                    <a href="{{ url($category->route->route) }}">
                        <span class="absolute inset-0"></span>
                        {{ $category->name }}
                    </a>
                </h3>
            </div>
        </div>
    </div>
@else
    <div class="group aspect-h-1 aspect-w-2 overflow-hidden rounded-lg sm:aspect-none sm:relative sm:h-full">
        <img src="{{ $category->getFirstMediaUrl('featured') }}"
             alt="{{ $category->meta->title }}"
             class="object-cover object-center group-hover:opacity-75">
        <div aria-hidden="true" class="bg-gradient-to-b from-transparent to-black opacity-50 sm:absolute sm:inset-0"></div>
        <div class="flex items-end p-6 sm:absolute sm:inset-0">
            <div>
                <h3 class="font-semibold text-white">
                    <a href="{{ url($category->route->route) }}">
                        <span class="absolute inset-0"></span>
                        {{ $category->name }}
                    </a>
                </h3>
            </div>
        </div>
    </div>
@endif

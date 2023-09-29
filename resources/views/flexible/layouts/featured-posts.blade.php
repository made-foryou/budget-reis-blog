<div class="w-full bg-white py-12">
    <div class="container mx-auto h-auto">
        <div class="h-full grid sm:grid-cols-3">
            @if ($first)
            <div class="col-span-2 p-4">
                <x-featured-article :post="$first"></x-featured-article>
            </div>
            @endif
            @if ($second)
            <div class="h-full p-4">
                <x-featured-article :post="$second"></x-featured-article>
            </div>
            @endif
        </div>
    </div>
</div>

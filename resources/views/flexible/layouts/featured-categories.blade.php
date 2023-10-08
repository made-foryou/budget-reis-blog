<div class="bg-gray-50">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
        <div class="sm:flex sm:items-baseline sm:justify-between">
            <h2 class="text-2xl font-bold tracking-tight text-slate-900">Uitgelichte categorieën</h2>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:grid-rows-2 sm:gap-x-6 lg:gap-8">
            @if ($first)
                <x-category :category="$first" :first="true" />
            @endif
            @if ($second)
                <x-category :category="$second" />
            @endif
            @if ($third)
                <x-category :category="$third" />
            @endif
        </div>
    </div>
</div>

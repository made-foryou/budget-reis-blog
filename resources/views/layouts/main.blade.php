<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $meta['meta']->title ?? config('budget-reis.default_title') }}</title>
        <meta name="description" content="{{ $meta['meta']->description ?? config('budget-reis.default_description') }}" />

        <meta name="og:title" content="{{ $meta['meta']->title_social ?? $meta['meta']->title ?? config('budget-reis.default_title') }}">
        <meta name="og:description" content="{{ $meta['meta']->description_social ?? $meta['meta']->description ?? config('budget-reis.default_description') }}">
        @if ($meta['meta'] && $meta['meta']->getFirstMedia('featured'))
            <meta name="og:image" content="{{ $meta['meta']->getFirstMedia('featured')->getFullUrl() }}">
        @endif

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header class="bg-white w-screen fixed top-0 left-0 z-50 shadow">
            <nav class="isolate mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=teal&shade=400" alt="{{ config('app.name') }}">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    @foreach($menu['categories'] as $category)
                        <div data-flyout>
                            <div class="bg-white py-5">
                                <div class="mx-auto max-w-7xl">
                                    <a data-trigger href="{{ ($category->categories->visible()->isEmpty() ? $category->route->route : '#') }}" class="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">
                                        {{ $category->name }}
                                        @if ($category->categories->visible()->isNotEmpty())
                                            <svg data-icon class="h-5 w-5 transition ease-in-out duration-150 rotate-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        @endif
                                    </a>
                                </div>
                            </div>
                            <div data-menu class="absolute inset-x-0 top-0 -z-10 bg-white pt-16 shadow-lg ring-1 ring-gray-900/5 opacity-0 -translate-y-1 transition ease-out duration-200">
                                <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-6 py-10 lg:grid-cols-2 lg:px-8">
                                    <div class="grid grid-cols-2 gap-x-6 sm:gap-x-8">
                                        @if ($category->categories->visible()->isNotEmpty())
                                        <div>
                                            <h3 class="text-sm font-medium leading-6 text-gray-500">
                                                {{ $category->name }}
                                            </h3>
                                            <div class="mt-6 flow-root">
                                                <div class="-my-2">
                                                    @foreach ($category->categories->visible() as $child)
                                                    <a href="{{ $child->route->route }}" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">
{{--                                                        <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />--}}
{{--                                                        </svg>--}}
                                                        {{ $child->name }}
                                                    </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        @endif
{{--                                        <div>--}}
{{--                                            <h3 class="text-sm font-medium leading-6 text-gray-500">Resources</h3>--}}
{{--                                            <div class="mt-6 flow-root">--}}
{{--                                                <div class="-my-2">--}}
{{--                                                    <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                        <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />--}}
{{--                                                        </svg>--}}
{{--                                                        Community--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                        <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />--}}
{{--                                                        </svg>--}}
{{--                                                        Partners--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                        <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />--}}
{{--                                                        </svg>--}}
{{--                                                        Guides--}}
{{--                                                    </a>--}}
{{--                                                    <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                        <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                            <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />--}}
{{--                                                        </svg>--}}
{{--                                                        Webinars--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
{{--                                    <div class="grid grid-cols-1 gap-10 sm:gap-8 lg:grid-cols-2">--}}
{{--                                        <h3 class="sr-only">Recent posts</h3>--}}
{{--                                        <article class="relative isolate flex max-w-2xl flex-col gap-x-8 gap-y-6 sm:flex-row sm:items-start lg:flex-col lg:items-stretch">--}}
{{--                                            <div class="relative flex-none">--}}
{{--                                                <img class="aspect-[2/1] w-full rounded-lg bg-gray-100 object-cover sm:aspect-[16/9] sm:h-32 lg:h-auto" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80" alt="">--}}
{{--                                                <div class="absolute inset-0 rounded-lg ring-1 ring-inset ring-gray-900/10"></div>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <div class="flex items-center gap-x-4">--}}
{{--                                                    <time datetime="2023-03-16" class="text-sm leading-6 text-gray-600">Mar 16, 2023</time>--}}
{{--                                                    <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-100">Marketing</a>--}}
{{--                                                </div>--}}
{{--                                                <h4 class="mt-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                    <a href="#">--}}
{{--                                                        <span class="absolute inset-0"></span>--}}
{{--                                                        Boost your conversion rate--}}
{{--                                                    </a>--}}
{{--                                                </h4>--}}
{{--                                                <p class="mt-2 text-sm leading-6 text-gray-600">Et et dolore officia quis nostrud esse aute cillum irure do esse. Eiusmod ad deserunt cupidatat est magna Lorem.</p>--}}
{{--                                            </div>--}}
{{--                                        </article>--}}
{{--                                        <article class="relative isolate flex max-w-2xl flex-col gap-x-8 gap-y-6 sm:flex-row sm:items-start lg:flex-col lg:items-stretch">--}}
{{--                                            <div class="relative flex-none">--}}
{{--                                                <img class="aspect-[2/1] w-full rounded-lg bg-gray-100 object-cover sm:aspect-[16/9] sm:h-32 lg:h-auto" src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3270&q=80" alt="">--}}
{{--                                                <div class="absolute inset-0 rounded-lg ring-1 ring-inset ring-gray-900/10"></div>--}}
{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <div class="flex items-center gap-x-4">--}}
{{--                                                    <time datetime="2023-03-10" class="text-sm leading-6 text-gray-600">Mar 10, 2023</time>--}}
{{--                                                    <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-100">Sales</a>--}}
{{--                                                </div>--}}
{{--                                                <h4 class="mt-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                    <a href="#">--}}
{{--                                                        <span class="absolute inset-0"></span>--}}
{{--                                                        How to use search engine optimization to drive sales--}}
{{--                                                    </a>--}}
{{--                                                </h4>--}}
{{--                                                <p class="mt-2 text-sm leading-6 text-gray-600">Optio cum necessitatibus dolor voluptatum provident commodi et.</p>--}}
{{--                                            </div>--}}
{{--                                        </article>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach($menu['pages'] as $page)
                            <div data-flyout>
                                <div class="bg-white py-5">
                                    <div class="mx-auto max-w-7xl">
                                        <a data-trigger href="{{ ($page->children->visible()->isEmpty() ? $page->route->route : '#') }}" class="inline-flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900" aria-expanded="false">
                                            {{ $page->name }}
                                            @if ($page->children->visible()->isNotEmpty())
                                                <svg data-icon class="h-5 w-5 transition ease-in-out duration-150 rotate-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div data-menu class="absolute inset-x-0 top-0 -z-10 bg-white pt-16 shadow-lg ring-1 ring-gray-900/5 opacity-0 -translate-y-1 transition ease-out duration-200">
                                    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 px-6 py-10 lg:grid-cols-2 lg:px-8">
                                        <div class="grid grid-cols-2 gap-x-6 sm:gap-x-8">
                                            @if ($page->children->visible()->isNotEmpty())
                                                <div>
                                                    <h3 class="text-sm font-medium leading-6 text-gray-500">
                                                        {{ $page->name }}
                                                    </h3>
                                                    <div class="mt-6 flow-root">
                                                        <div class="-my-2">
                                                            @foreach ($page->children->visible() as $child)
                                                                <a href="{{ $child->route->route }}" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">
                                                                    <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                                                    </svg>
                                                                    {{ $child->name }}
                                                                </a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                <div>
{{--                                                    <h3 class="text-sm font-medium leading-6 text-gray-500">Resources</h3>--}}
{{--                                                    <div class="mt-6 flow-root">--}}
{{--                                                        <div class="-my-2">--}}
{{--                                                            <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                                <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />--}}
{{--                                                                </svg>--}}
{{--                                                                Community--}}
{{--                                                            </a>--}}
{{--                                                            <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                                <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418" />--}}
{{--                                                                </svg>--}}
{{--                                                                Partners--}}
{{--                                                            </a>--}}
{{--                                                            <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                                <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />--}}
{{--                                                                </svg>--}}
{{--                                                                Guides--}}
{{--                                                            </a>--}}
{{--                                                            <a href="#" class="flex gap-x-4 py-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                                <svg class="h-6 w-6 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">--}}
{{--                                                                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />--}}
{{--                                                                </svg>--}}
{{--                                                                Webinars--}}
{{--                                                            </a>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-10 sm:gap-8 lg:grid-cols-2">
{{--                                            <h3 class="sr-only">Recent posts</h3>--}}
{{--                                            <article class="relative isolate flex max-w-2xl flex-col gap-x-8 gap-y-6 sm:flex-row sm:items-start lg:flex-col lg:items-stretch">--}}
{{--                                                <div class="relative flex-none">--}}
{{--                                                    <img class="aspect-[2/1] w-full rounded-lg bg-gray-100 object-cover sm:aspect-[16/9] sm:h-32 lg:h-auto" src="https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3603&q=80" alt="">--}}
{{--                                                    <div class="absolute inset-0 rounded-lg ring-1 ring-inset ring-gray-900/10"></div>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <div class="flex items-center gap-x-4">--}}
{{--                                                        <time datetime="2023-03-16" class="text-sm leading-6 text-gray-600">Mar 16, 2023</time>--}}
{{--                                                        <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-100">Marketing</a>--}}
{{--                                                    </div>--}}
{{--                                                    <h4 class="mt-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                        <a href="#">--}}
{{--                                                            <span class="absolute inset-0"></span>--}}
{{--                                                            Boost your conversion rate--}}
{{--                                                        </a>--}}
{{--                                                    </h4>--}}
{{--                                                    <p class="mt-2 text-sm leading-6 text-gray-600">Et et dolore officia quis nostrud esse aute cillum irure do esse. Eiusmod ad deserunt cupidatat est magna Lorem.</p>--}}
{{--                                                </div>--}}
{{--                                            </article>--}}
{{--                                            <article class="relative isolate flex max-w-2xl flex-col gap-x-8 gap-y-6 sm:flex-row sm:items-start lg:flex-col lg:items-stretch">--}}
{{--                                                <div class="relative flex-none">--}}
{{--                                                    <img class="aspect-[2/1] w-full rounded-lg bg-gray-100 object-cover sm:aspect-[16/9] sm:h-32 lg:h-auto" src="https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3270&q=80" alt="">--}}
{{--                                                    <div class="absolute inset-0 rounded-lg ring-1 ring-inset ring-gray-900/10"></div>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <div class="flex items-center gap-x-4">--}}
{{--                                                        <time datetime="2023-03-10" class="text-sm leading-6 text-gray-600">Mar 10, 2023</time>--}}
{{--                                                        <a href="#" class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-100">Sales</a>--}}
{{--                                                    </div>--}}
{{--                                                    <h4 class="mt-2 text-sm font-semibold leading-6 text-gray-900">--}}
{{--                                                        <a href="#">--}}
{{--                                                            <span class="absolute inset-0"></span>--}}
{{--                                                            How to use search engine optimization to drive sales--}}
{{--                                                        </a>--}}
{{--                                                    </h4>--}}
{{--                                                    <p class="mt-2 text-sm leading-6 text-gray-600">Optio cum necessitatibus dolor voluptatum provident commodi et.</p>--}}
{{--                                                </div>--}}
{{--                                            </article>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            <div class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-10"></div>
                <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="">
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Product</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Features</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Marketplace</a>
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Company</a>
                            </div>
                            <div class="py-6">
                                <a href="#" class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Log in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        @include('layouts.partials.footer')

    </body>
</html>

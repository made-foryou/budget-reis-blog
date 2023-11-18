@extends('layouts.main', [
    'menu' => $model['menu'],
    'meta' => $model['meta'],
])

@section('content')

    <div class="h-[80px] bg-white"></div>

    @foreach ($model['category']->content as $layout)
        @include($layout->getView(), $layout->toArray())
    @endforeach

@endsection

@extends('layouts.frontend')

{{-- @include('partials.frontslider') --}}


@section('content')
    {{-- Home page blocks --}}
    @if ($blocks ?? false)
        {!! \App\Helpers\RenderBlocksHelper::render($blocks) !!}
    @endif
@endsection





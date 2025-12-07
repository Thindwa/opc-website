@extends('layouts.frontend')
<style>
    /* Banner Area */
    .banner-area {
        min-height: 150px !important;
        /* or height: 200px if you want fixed height */
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
    }

    .banner-area::before {
        content: '';
        background: rgba(0, 0, 0, 0.6);
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .banner-text {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    .banner-title {
        font-size: 2rem;
        /* Slightly smaller to match new height */
        font-weight: 700;
        text-transform: uppercase;
    }
</style>

@section('content')


    <!-- Main Content Section -->
    <div class="mx-lg-5 mx-md-5 my-2">
        <section>

            <!-- Rendered Table Content -->
            <div class="row">
                <div class="col-lg-12">
                    {!! \App\Helpers\RenderBlocksHelper::render($page->content) !!}
                </div>
            </div>
        </section>
    </div>
@endsection

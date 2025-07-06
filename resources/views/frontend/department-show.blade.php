@extends('layouts.frontend')

@section('content')
<div class="container py-5 department-show">
    <h1 class="mb-4">{{ $department->name }}</h1>

    @if($department->image || $department->title)
    <img src="{{ $department->image_url }}" alt="{{ $department->name }}" class="img-fluid rounded mb-4 department-image" style="max-height: 400px;">
    @endif

    @if($department->description)
    <div class="mb-4">
        <p class="lead">{{ $department->description }}</p>
    </div>
    @endif

    @if($department->mandate)
    <div class="mb-4 department-section">
        <h3 class="section-title">Mandate</h3>
        <div class="section-content">{{ $department->mandate }}</div>
    </div>
    @endif

    @if($department->vision)
    <div class="mb-4 department-section">
        <h3 class="section-title">Vision</h3>
        <div class="section-content">{{ $department->vision }}</div>
    </div>
    @endif

    @if($department->mission)
    <div class="mb-4 department-section">
        <h3 class="section-title">Mission</h3>
        <div class="section-content">{{ $department->mission }}</div>
    </div>
    @endif

    @if($department->strategic_goals)
    <div class="mb-4 department-section">
        <h3 class="section-title">Strategic Goals</h3>
        <div class="section-content">{!! nl2br(e($department->strategic_goals)) !!}</div>
    </div>
    @endif

    <a href="{{ route('frontend.departments') }}" class="btn btn-primary mt-4 back-button">
    ← Back to Departments
</a>
    </a>
</div>
@endsection

@section('styles')
<style>
    .department-show {
        max-width: 900px;
        margin: 0 auto;
    }
    .department-image {
        width: 100%;
        object-fit: cover;
    }
    .section-title {
        color: #2c3e50;
        border-bottom: 2px solid #28a745;
        padding-bottom: 8px;
        margin-bottom: 15px;
    }
    .section-content {
        line-height: 1.8;
        font-size: 1.1rem;
    }
    .back-button {
        transition: all 0.3s ease;
    }
    .back-button:hover {
        transform: translateX(-5px);
    }
</style>
@endsection
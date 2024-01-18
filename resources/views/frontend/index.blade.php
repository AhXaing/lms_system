@extends('frontend.master')
@section('home')
    @include('frontend.home.hero-area')

    @include('frontend.home.feature-area')

    @include('frontend.home.category-area')

    @include('frontend.home.course-area')

    @include('frontend.home.course-area1')

    @include('frontend.home.funfact-area')

    @include('frontend.home.cta-area')

    @include('frontend.home.testimonial-area')

    <div class="section-block"></div>

    @include('frontend.home.about-area')

    <div class="section-block"></div>

    @include('frontend.home.register-area')

    <div class="section-block"></div>

    @include('frontend.home.client-logo-area')

    @include('frontend.home.blog-area')

    @include('frontend.home.get-start-area')

    @include('frontend.home.subscriber-area')
@endsection

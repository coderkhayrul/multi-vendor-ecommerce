@extends('layouts.home_layout')
@section('home-content')
    @include('frontend.includes.hero-slider')
    <!--End hero slider-->
    @include('frontend.includes.feature-category')
    <!--End category slider-->
    @include('frontend.includes.banner')
    <!--End banners-->
    @include('frontend.includes.popular-product')
    <!--Products Tabs-->
    @include('frontend.includes.daily-best-seller')
    <!--End Best Sales-->
    @include('frontend.includes.day-deals')
    <!--End Deals-->
    @include('frontend.includes.all-feature-product')
    <!--End 4 columns-->
@endsection
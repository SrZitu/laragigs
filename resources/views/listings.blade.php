@extends('layout')

{{-- section name should match with the layout yeild --}}
@section('content')
@include('partials.hero')
@include('partials.search')
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>

@if (count($listings) == 0)
    <p> No listing found</p>
@else
    @foreach ($listings as $listing)
    <x-listing-card :listing="$listing"/>
    {{-- if we want to display varaible we must use : sign --}}
    @endforeach
@endif
</div>
@endsection

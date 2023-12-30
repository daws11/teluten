@extends('app')

@section('title', 'Location & Facilities')

@section('content')
<div class="tabs">
    <ul>
        <li><a href="#location">Location</a></li>
        <li><a href="#facilities">Facilities</a></li>
    </ul>
</div>

<div id="location">
    <h2>Location</h2>
    <div class="location-list">
        @foreach(['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P'] as $location)
            <div class="location-item">
                {{ $location }}
            </div>
        @endforeach
    </div>
</div>

<div id="facilities" style="display:none;">
    <h2>Facilities</h2>
    <!-- Facilities content goes here -->
</div>
@endsection

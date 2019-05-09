@extends('layout')
@include('menu')
@section('content')

@include('browseRequest')

<div class="filter">
    <!-- select singer -->
    <div class="filter-item">
        <div class="seltext">
            <label>Singer: </label>
        </div>

        <div class="select">
            <select type="option" id="singer" name="singer" onchange="updateBrowse()">
                <option value = "all">Select a singer</option>
                @foreach($all_singer as $singer)
                    <option value="{{ $singer['singer'] }}" > {{ $singer['singer'] }} </option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- order of rank of sale -->
    <div class="filter-item">
        <div class="seltext">
            <label>Rank By: </label>
        </div >
        <div class="select">
            <select type="option" id="rank" name = "rank" onchange="updateBrowse()">
                <option value = "0">Select rank</option>
                <option value = "1">Best Sale</option>
                <option value = "2">Most View</option>
            </select>
        </div >
    </div >

    
    <!-- Filter singer -->
    <div class="filter-item">
        <div class="seltext">
            <label>Order by time: </label>
        </div>
        <div class="select">
            <select type="option" id="newest" name="newest" onchange="updateBrowse()">
                <option value = "1">From latest to earliest</option>
                <option value = "0">From earliest to latest</option>>
            </select>
        </div>
    </div >
</div>




<div id="displayAlbum"></div>
<script> updateBrowse();</script>


@endsection
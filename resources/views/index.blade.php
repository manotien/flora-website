@extends('layouts.app')

@section('content')
<div class="container">
	<br>
    <p style="font-size:300%;text-align:center;">List of Locations</p>
    <br><br>
    <div class="list-group">
        @foreach ($location as $loca)
            <button type="button" class="list-group-item" onclick="window.location='{{ url("/") }}/location/{{$loca->id}}'"><span style="font-size:150%;">{{$loca->gazetteer}} Collected by {{$loca->collector}}</span><span style="font-size:150%;float:right;">{{$loca->collection_day}}/{{$loca->collection_month}}/{{$loca->collection_year}}</span></button>
        @endforeach
   
    </div>
</div>

@endsection

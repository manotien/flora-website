@extends('layouts.app')

@section('content')
<div class="container">
  <br>
	<table class="table table-striped" style="width: 90%" align="center">
   
    <tbody >
      <tr>
        <td width="30%">Place Name:</td>
        <td >{{$location->gazetteer}}</td>
      </tr>
      <tr>
        <td>Protected:</td>
        <td>{{$location->protected}}</td>
      </tr>
      <tr>
        <td>Country:</td>
        <td>{{$location->country}}</td>
      </tr>
      <tr>
        <td>Region:</td>
        <td>{{$location->florareg}}</td>
      </tr>
      <tr>
        <td>Province:</td>
        <td>{{$location->majorarea}}</td>
      </tr>
      <tr>
        <td>District:</td>
        <td>{{$location->minorarea}}</td>
      </tr>
      <tr>
        <td>Subdistrict:</td>
        <td>{{$location->tambon}}</td>
      </tr>
      <tr>
        <td>Habitat:</td>
        <td>{{$location->habitat}}</td>
      </tr>
      <tr>
        <td>Locality Note:</td>
        <td>{{$location->locality_notes}}</td>
      </tr>
      <tr>
        <td>Collection Date:</td>
        <td>{{$location->collection_day}}/{{$location->collection_month}}/{{$location->collection_year}}</td>
      </tr>
    </tbody>
    
  </table>

  <br>
  <p style="font-size:200%;">List of Floras</p>
  <br>
    <div class="row" >
        @foreach ($floras as $flora)
        <div class="col-sm-6 col-md-3" style="display:flex; flex-wrap: wrap">
            <a class="thumbnail" href="{{ url('') }}/location/{{$location->id}}/flora/{{$flora->id}}">
                <img src="{{url('')}}/public/photo/{{$flora->floraphotos[0]->file_name}}" style="width:220px">
                <p class="topic" >Family: {{$flora->family}}<br><span style="color:black">Genus: {{$flora->genus}}</span></p>
            </a>
        </div>
     	@endforeach
    </div>

</div>
@endsection

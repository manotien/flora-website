@extends('layouts.app')


@section('content')
<div class="container">
  <br>
	<table class="table table-striped" style="width: 90%" align="center">
   
    <tbody >
      <tr>
        <td width="30%">Family:</td>
        <td >{{$flora->family}}</td>
      </tr>
      <tr>
        <td width="30%">Genus:</td>
        <td >{{$flora->genus}}</td>
      </tr>
      <tr>
        <td width="30%">Vernacular Name:</td>
        <td >{{$flora->vernacular}}</td>
      </tr>
      <tr>
        <td width="30%">Species 1:</td>
        <td >{{$flora->sp1}}</td>
      </tr>
      <tr>
        <td width="30%">Species 2:</td>
        <td >{{$flora->sp2}}</td>
      </tr>
      <tr>
        <td width="30%">Species 3:</td>
        <td >{{$flora->sp3}}</td>
      </tr>
      <tr>
        <td width="30%">Plant Description:</td>
        <td >{{$flora->plant_description}}</td>
      </tr>
      <tr>
        <td width="30%">Phenology:</td>
        <td >{{$flora->phenology}}</td>
      </tr>
      
      <tr>
        <td width="30%">Cultivate:</td>
        <td >{{$flora->cultivated}}</td>
      </tr>
      <tr>
        <td width="30%">Latitude:</td>
        <td >{{$flora->lat}}</td>
      </tr>
      <tr>
        <td width="30%">Longitude:</td>
        <td >{{$flora->long}}</td>
      </tr>
      <tr>
        <td width="30%">Altitude:</td>
        @if ($flora->altmax=="")
          <td >{{$flora->alt}}</td>
        @else
          <td >{{$flora->alt}}-{{$flora->altmax}}</td>
        @endif
      </tr>
      <tr>
        <td width="30%">Notes:</td>
        <td >{{$flora->notes}}</td>
      </tr>

      <tr>
        <td width="30%">Det By:</td>
        <td >{{$flora->detby}}</td>
      </tr>
      @if ($flora->detdd!="")      
        <tr>
          <td width="30%">Det Date:</td>
          <td >{{$flora->detdd}}/{{$flora->detmm}}/{{$flora->detyy}}</td>
        </tr>
      @endif
      <tr>
        <td width="30%">Det Notes:</td>
        <td >{{$flora->detnotes}}</td>
      </tr>
    </tbody>
    
  </table>


</div>
@endsection

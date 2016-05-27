@extends('layouts.app')

@section('content')

<div class="container">
	<br>
   	<p style="font-size:300%">Select location to export:</p><br>
	<form action="{{url('')}}/export" method="post">
		<table class="table table-hover" id="tableId">
		    <tbody>
		    	
				@foreach ($locations as $location)
					<tr onclick="return OptionsSelected(this)" id="{{$location->id}}" style="cursor: pointer; cursor: hand;">
						<td><input type="checkbox" name="locations[]" value="{{$location}}" id="check{{$location->id}}"  onClick="this.checked=!this.checked"> <span style="font-size:150%;padding-left:10px"> {{$location->gazetteer}} by {{$location->collector}}</span><span style="font-size:150%;float:right;">{{$location->collection_day}}/{{$location->collection_month}}/{{$location->collection_year}}</span><br><br></td>
					</tr>
				@endforeach
		    	
		    </tbody>
		  </table>
	    
		
		<input type="submit" name="export" value="Download">

	</form>
</div>

@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Http\Requests;

class LocationController extends Controller
{
    //
    public function index($id){
		$location = Location::find($id);
        $flora = $location->floras;
        foreach ($flora as $key => $value) {
            $flora[$key]->floraphotos;
        }
    
        return view('location')->with('location',$location)->with('floras',$flora);
    }

    public function store(Request $request){
        $data = json_decode($request->location,true);

        $location = Location::where('gazetteer',$data['gazetteer'])->where('collection_day',$data['collection_day'])->where('collection_month',$data['collection_month'])->where('collection_year',$data['collection_year'])->where('collector',$data['collector'])->get();
    	if(count($location)==0)
            $location = new Location;
        else
            $location = $location[0];

        $location->dubs = $data['dubs'];
        $location->barcode = $data['barcode'];
        $location->accession = $data['accession'];
        $location->collector = $data['collector'];
        $location->addcoll = $data['addcoll'];
        $location->prefix = $data['prefix'];
        $location->number = $data['number'];
        $location->suffix = $data['suffix'];
        $location->collection_day = $data['collection_day'];
        $location->collection_month = $data['collection_month'];
        $location->collection_year = $data['collection_year'];
        $location->country = $data['country'];
        $location->florareg = $data['florareg'];
        $location->bkfareacod = $data['bkfareacod'];
        $location->majorarea = $data['majorarea'];
        $location->minorarea = $data['minorarea'];
        $location->tambon = $data['tambon'];
        $location->protected = $data['protected'];
        $location->gazetteer = $data['gazetteer'];
        $location->locality_notes = $data['locality_notes'];
        $location->habitat = $data['habitat'];
        $location->timestamp_location = $data['timestamp_location'];
        $location->is_export = $data['is_export'];
        $location->save();

        return $location->id;
    }
}

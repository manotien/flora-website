<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flora;
use App\Location;
use App\Http\Requests;
use App\Floraphoto;
class FloraController extends Controller
{
    //
    public function index($id,$id2){
        $flora = Flora::find($id2);
        $flora->floraphotos;
       
        return view('picture')->with('flora',$flora);
	}
    public function storephoto(Request $request){

        $photo = Floraphoto::where('file_name',$request->title)->get();
        if(count($photo)==0){
            $photo = new Floraphoto;
        }
        else{
            $photo = $photo[0];
        }

        if ($request->hasFile('image')) {
            $request->file('image')->move(base_path() . '/public/photo/' , $request->title );
            $photo->file_name = $request->title;
            $photo->flora_id = $request->id;
            $photo->path = base_path() . '/public/photo/' . $request->title;
            $photo->save();
            return $photo->id;
        }
    }
    public function store(Request $request){
    	$data = json_decode($request->flora,true);
        $flora_id = array();
        for($i = 0 ; $i < count($data) ; $i++)
        {

            $flora = Flora::where('location_id',$data[$i]['location_id'])->where('timestamp_flora',$data[$i]['timestamp_flora'])->get();
            
            if(count($flora)==0){
                $flora = new Flora;
            }
            else{
                $flora = $flora[0];
            }
        
            $flora->location_id = $data[$i]['location_id'];
            $flora->family = $data[$i]['family'];
            $flora->genus = $data[$i]['genus'];
            $flora->cf = $data[$i]['cf'];
            $flora->sp1 = $data[$i]['sp1'];
            $flora->author1 = $data[$i]['author1'];
            $flora->rank1 = $data[$i]['rank1'];
            $flora->sp2 = $data[$i]['sp2'];
            $flora->author2 = $data[$i]['author2'];
            $flora->rank2 = $data[$i]['rank2'];
            $flora->sp3 = $data[$i]['sp3'];
            $flora->author3 = $data[$i]['author3'];
            $flora->plant_description = $data[$i]['plant_description'];
            $flora->phenology = $data[$i]['phenology'];
            $flora->detby = $data[$i]['detby'];
            $flora->detdd = $data[$i]['detdd'];
            $flora->detmm = $data[$i]['detmm'];
            $flora->detyy = $data[$i]['detyy'];
            $flora->detnotes = $data[$i]['detnotes'];
            $flora->cultivated = $data[$i]['cultivated'];
            $flora->cultnotes = $data[$i]['cultnotes'];
            $flora->notes = $data[$i]['notes'];
            $flora->lat = $data[$i]['lat'];
            $flora->ns = $data[$i]['ns'];
            $flora->long = $data[$i]['long'];
            $flora->ew = $data[$i]['ew'];
            $flora->alt = $data[$i]['alt'];
            $flora->altmax = $data[$i]['altmax'];
            $flora->altnote = $data[$i]['altnote'];
            $flora->vernacular = $data[$i]['vernacular'];
            $flora->language = $data[$i]['language'];
            $flora->timestamp_flora = $data[$i]['timestamp_flora'];


            $flora->save();
            $flora_id[]=$flora->id;
        }
        
        return  $flora_id;
    }
}

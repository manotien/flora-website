<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Location;
use App\Flora;
use App\Http\Requests;
use Response;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $location = Location::all();
        return view('export')->with('locations',$location);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locations = $request->locations;
        $list = array();
        if(!empty($locations))
        {
            $filename = "tweets.csv";
            $handle = fopen($filename, 'w+');
            fputcsv($handle, array("dubs","barcode","accession","collector","addcoll","prefix","number","suffix","collection_day","collection_month","collection_year","family","genus","cf","sp1","author1","rank1","sp2","author2","rank2","sp3","author3","plant_description","phenology","detby","detdd","detmm","detyy","detnotes","country","florareg","bkfareacod","majorarea","minorarea","tambon","protected","gazetteer","locality_notes","habitat","cultivated","cultnotes","notes","lat","ns","long","ew","alt","altmax","altnote","vernacular","language"));
            
            foreach ($locations as $location) {
                $loca = json_decode($location,true);
                $floras = Flora::where('location_id',$loca['id'])->get();
                foreach ($floras as $flora) {
                    //return $flora->long;
                    $array = array($loca['dubs'],$loca['barcode'],$loca['accession'],$loca['collector'],$loca['addcoll'],$loca['prefix'],$loca['number'],$loca['suffix'],$loca['collection_day'],$loca['collection_month'],$loca['collection_year'],$flora->family,$flora->genus,$flora->cf,$flora->sp1,$flora->author1,$flora->rank1,$flora->sp2,$flora->author2,$flora->rank2,$flora->sp3,$flora->author3,$flora->plant_description,$flora->phenology,$flora->detby,$flora->detdd,$flora->detmm,$flora->detyy,$flora->detnotes,$loca['country'],$loca['florareg'],$loca['bkfareacod'],$loca['majorarea'],$loca['minorarea'],$loca['tambon'],$loca['protected'],$loca['gazetteer'],$loca['locality_notes'],$loca['habitat'],$flora->cultivated,$flora->cultnotes,$flora->notes,$flora->lat,$flora->ns,$flora->long,$flora->ew,$flora->alt,$flora->altmax,$flora->altnote,$flora->vernacular,$flora->language);
                    $array = array_map("utf8_decode", $array);
                    fputcsv($handle, $array);
                }
            }
            fclose($handle);

            $headers = array(
                'Content-Type' => 'text/csv',
            );
            return Response::download($filename, 'export.csv', $headers);
            
        } 
        
        //return $list;
        return redirect('/export');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

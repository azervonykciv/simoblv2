<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\master;
use App\agenda;
use App\jendok;
use App\jenter;
use App\doc;
use App\dokumen;
use App\alert;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use Carbon\Carbon;

class Client extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('client');

        $projects = master::all();
        foreach ($projects as $key => $loop)
        {
            $dh = Carbon::now()->diffInDays(new Carbon($loop->sampai));
            if($dh>30 && $dh<=60)
            {
                $df = 60 - $dh;

                $dm = Carbon::now()->diffInMonths(new Carbon($loop->sampai));
            $data = [
                        'sk_hr' => $df,
                        'sk_bln' => $dm
                    ];
            $projecte = master::find($loop->id);
            $projecte->update($data);
            }
            elseif($dh>60 && $dh<=90)
            {
                $df = 90 - $dh;
                $dm = Carbon::now()->diffInMonths(new Carbon($loop->sampai));
            $data = [
                        'sk_hr' => $df,
                        'sk_bln' => $dm
                    ];
            $projecte = master::find($loop->id);
            $projecte->update($data);
            }
            elseif($dh<30)
            {
                $df = $dh;
                $dm = Carbon::now()->diffInMonths(new Carbon($loop->sampai));
            $data = [
                        'sk_hr' => $df,
                        'sk_bln' => $dm
                    ];
            $projecte = master::find($loop->id);
            $projecte->update($data);
            }
        }
    }


    public function index()
    {
        
        $master = master::all();
        $dataId = array();
        $dataRev = array();
        $yourFirstChart["chart"] = array("type" => "column");
        $yourFirstChart["title"] = array("text" => "Total Revenue Project");
        $yourFirstChart["xAxis"] = array("categories" => ['Pendapatan per Tahun']);
        $yourFirstChart["yAxis"] = array("title" => array("text" => "Total Revenue (dalam Rupiah)"));
        foreach ($master as $m) 
        { 
 
            $yourFirstChart["series"][] = array("name" => $m->id, "data" => array($m->total_revenue)); 
        }
        return view('Client/dashboard',compact('yourFirstChart'));


}

}

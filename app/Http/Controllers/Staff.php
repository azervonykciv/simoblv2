<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PDF;
use App\akun;
use App\witel;
use App\master;
use App\agenda;
use App\jendok;
use App\jenter;
use App\td;
use App\doc;
use App\dokumen;
use App\alert;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\UploadRequest;
use App\Http\Controllers\Controller;
use Input;
Use App\upload;
use Validator;
use Session;
use Carbon\Carbon;

class Staff extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('staff');

        $projects = master::all();
        foreach ($projects as $key => $loop)
        {
            $dh = $loop->sk_hr;
            if($dh>30 && $dh<=60)
            {
                $df = 60 - $dh;

                $dm = $loop->sk_bln;
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

        $projects = master::all();
        foreach ($projects as $key => $loop)
        {
            

            if($loop->stat_pr == 1){

                if($loop->sk_bln <=3 && $loop->sk_bln >2)
                {
                    $result = alert::where('idproj',$loop->id)
                                                ->first();

                    if(is_null($result))
                    {
                        alert::create([
                                    'idproj' => $loop->id,
                                    'label' => 'bower_components/AdminLTE/dist/img/Yellow.jpg'
                                ]);
                    }
                    else if(!is_null($result))
                    {
                        $up = alert::find($result->id);
                        $data = [
                                    'label' => 'bower_components/AdminLTE/dist/img/Yellow.jpg'
                                ];
                        $up->update($data);
                    }  
                }
                elseif($loop->sk_bln <= 2 && $loop->sk_bln >1)
                {
                    $result = alert::where('idproj',$loop->id)
                                                ->first();

                    if(is_null($result))
                    {
                        alert::create([
                                    'idproj' => $loop->id,
                                    'label' => 'bower_components/AdminLTE/dist/img/Orange.jpg'
                                ]);
                    }
                    else if(!is_null($result))
                    {
                        $up = alert::find($result->id);
                        $data = [
                                    'label' => 'bower_components/AdminLTE/dist/img/Orange.jpg'
                                ];
                        $up->update($data);
                    }  
                }
                else if($loop->sk_bln <= 1)
                {
                    $result = alert::where('idproj',$loop->id)
                                            ->first();
                    if(is_null($result))
                    {
                        alert::create([
                                    'idproj' => $loop->id,
                                    'label' => 'bower_components/AdminLTE/dist/img/Red.jpg'
                                    ]);
                    }
                    else if(!is_null($result))
                    {
                        $up = alert::find($result->id);
                        $data = [
                                    'label' => 'bower_components/AdminLTE/dist/img/Red.jpg'
                                ];
                        $up->update($data);
                    }
                }
                else
                {
                    $result = alert::where('idproj',$loop->id)
                                            ->first();
                    if(!is_null($result))
                    {
                        $up = alert::find($result->id);
                        $up->delete();
                    }
                }
            }
        }

        

        $data['alert'] = \DB::table('alerts')
                   ->join('masters','alerts.idproj','=','masters.id')
                   ->select('alerts.*','masters.nama_proj','masters.sk_bln','masters.sk_hr')
                   ->orderBy('sk_bln','asc')->get();
        return view('Staff/dashboard',$data,compact('yourFirstChart'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // CRUD Project
    public function createProj() //Redirect pada halaman pembuatan project baru
    {
        
        $witel = witel::lists('witel','witel');    
        $tender = jenter::lists('jenis','jenis');
        return view('Staff/Project/insertDP',compact('tender'),compact('witel'));
    }

    public function showProj()
    {
        $data['project'] = master::all();

        return view('Staff/Project/showdataDP',$data);
    }

    public function storeProj(Request $request) // Mengirim Data Project pada DBase
    {
         $this->validate($request,[
            
            'id'=>'required',
            'witel'=>'required']);


         if(Input::has('mulai'))
        {
             $mulai = $this->dateConverter($request->input('mulai'));
        }
        else
        {
            $mulai = null;
        }
        if(Input::has('sampai'))
        {
             $sampai = $this->dateConverter($request->input('sampai'));

        }
        else
        {
            $sampai = null;
        }
        if(Input::has('delivery_layanan'))
        {
             $dellay = $this->dateConverter($request->input('delivery_layanan'));
        }
        else
        {
            $dellay = null;
        }
        if(Input::has('tgl_kfs'))
        {
             $tgl_kfs = $this->dateConverter($request->input('tgl_kfs'));
        }
        else
        {
            $tgl_kfs = null;
        }
        

    
       $data = $request->all();
       $data['mulai'] = $mulai;
       $data['sampai'] = $sampai;
       $data['delivery_layanan'] = $dellay;
       $data['tgl_kfs'] = $tgl_kfs;
       $data['stat_pr'] = 1;
       //dump($data);
       master::create($data);
       return redirect('Staff/proj/show');
    }
    
    public function editProject($id) //
    {
        $project = master::find($id);
       $witel = witel::lists('witel','witel');    
        $tender = jenter::lists('jenis','jenis');
        return view('Staff\Project\editDP',compact('project','tender','witel'));
    }

    public function updateProject(Request $request,$id)
    {
        $project = master::find($id);
    }

    public function deleteProject($id)
    {
        $project = master::find($id);
        $project->delete();
        return redirect('Staff/proj/show');
    }

    public function insertDoc($id)
    {
        $data['project'] = master::find($id);
        $doc = doc::where('idproj',$id)->first();
        if(!is_null($doc))
        {
            $data['doc'] = doc::find($doc->id);
            return view('Staff\Project\uploaddoc',$data);
        }   
        elseif(is_null($doc))
        {
            return view('Staff\Project\uploaddoc2',$data);
        }
    }

    public function storeDoc(Request $request)
    {
        $this->validate($request,[
            
            'projectid'=>'required']);

            if($request->hasFile('p1') && ($request->file('p1')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p1')->getClientOriginalName();
                $request->file('p1')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm1 = $fnp1;
                $stat1 = "Sudah Diupload";
            }
            else
            {
                $flnm1 = null;
                $stat1 = null;
            }
            if($request->hasFile('p2') && ($request->file('p2')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p2')->getClientOriginalName();
                $request->file('p2')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm2 = $fnp1;
                $stat2 = "Sudah Diupload";
            }
            else
            {
                 $flnm2 = null;
                 $stat2 = null;
            }
            if($request->hasFile('p3') && ($request->file('p3')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p3')->getClientOriginalName();
                $request->file('p3')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm3 = $fnp1;
                $stat3 = "Sudah Diupload";
            }
            else
            {
               $flnm3 = null;
               $stat3 = null;
            }
            if($request->hasFile('p4') && ($request->file('p4')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p4')->getClientOriginalName();
                $request->file('p4')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm4 = $fnp1;
                $stat4 = "Sudah Diupload";
            }
            else
            {
               $flnm4 = null;
               $stat4 = null;
            }
            if($request->hasFile('p5') && ($request->file('p5')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p5')->getClientOriginalName();
                $request->file('p5')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm5 = $fnp1;
                $stat5 = "Sudah Diupload";
            }
            else
            {
                $flnm5 = null;
                $stat5 = null;
            }
            if($request->hasFile('p6') && ($request->file('p6')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p6')->getClientOriginalName();
                $request->file('p6')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm6 = $fnp1;
                $stat6 = "Sudah Diupload";
            }
            else
            {
                $flnm6 = null;
                $stat6 =  null;
            }
            if($request->hasFile('p7') && ($request->file('p7')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p7')->getClientOriginalName();
                $request->file('p7')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm7 = $fnp1;
                $stat7 = "Sudah Diupload";
            }
            else
            {
                $flnm7 = null;
                $stat7 = null;
            }
            if($request->hasFile('p8') && ($request->file('p7')->guessClientExtension() == "pdf"))
            {
            
                $data = $request->all();
                $fnp1 = $request->file('p8')->getClientOriginalName();
                $request->file('p8')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm8 = $fnp1;
                $stat8 = "Sudah Diupload";
            }
            else
            {
                $flnm8 = null;
                $stat8 = null;
            }

            $data = [
                'idproj'=>$request->input('projectid'),
                'p1' => $flnm1,
                'stat_p1' => $stat1,
                'p2' => $flnm2,
                'stat_p2' => $stat2,
                'p3' => $flnm3,
                'stat_p3' => $stat3,
                'p4' => $flnm4,
                'stat_p4' => $stat4,
                'p5' => $flnm5,
                'stat_p5' => $stat5,
                'p6' => $flnm6,
                'stat_p6' => $stat6,
                'p7' => $flnm7,
                'stat_p7' => $stat7,
                'p8' => $flnm8,
                'stat_p8' => $stat8
                ];

        doc::create($data);
        return redirect()->back();
    }

    public function updateDoc($id,Request $request)
    {
            $doc = doc::find($id);
        
            if($request->hasFile('p1') && ($request->file('p1')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p1')->getClientOriginalName();
                $request->file('p1')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm1 = $fnp1;
                $stat1 = "Sudah Diupload";
            }
            else
            {
                $flnm1 = $doc->p1;
                $stat1 = $doc->stat_p1;
            }
            if($request->hasFile('p2') && ($request->file('p2')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p2')->getClientOriginalName();
                $request->file('p2')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm2 = $fnp1;
                $stat2 = "Sudah Diupload";
            }
            else
            {
                 $flnm2 = $doc->p2;
                 $stat2 = $doc->stat_p2;
            }
            if($request->hasFile('p3') && ($request->file('p3')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p3')->getClientOriginalName();
                $request->file('p3')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm3 = $fnp1;
                $stat3 = "Sudah Diupload";
            }
            else
            {
               $flnm3 = $doc->p3;
               $stat3 = $doc->stat_p3;
            }
            if($request->hasFile('p4') && ($request->file('p4')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p4')->getClientOriginalName();
                $request->file('p4')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm4 = $fnp1;
                $stat4 = "Sudah Diupload";
            }
            else
            {
               $flnm4 = $doc->p4;
               $stat4 = $doc->stat_p4;
            }
            if($request->hasFile('p5') && ($request->file('p5')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p5')->getClientOriginalName();
                $request->file('p5')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm5 = $fnp1;
                $stat5 = "Sudah Diupload";
            }
            else
            {
                $flnm5 = $doc->p5;
                $stat5 = $doc->stat_p5;
            }
            if($request->hasFile('p6') && ($request->file('p6')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p6')->getClientOriginalName();
                $request->file('p6')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm6 = $fnp1;
                $stat6 = "Sudah Diupload";
            }
            else
            {
                $flnm6 = $doc->p6;
                $stat6 =  $doc->stat_p6;
            }
            if($request->hasFile('p7') && ($request->file('p7')->guessClientExtension() == "pdf"))
            {
                $data = $request->all();
                $fnp1 = $request->file('p7')->getClientOriginalName();
                $request->file('p7')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm7 = $fnp1;
                $stat7 = "Sudah Diupload";
            }
            else
            {
                $flnm7 = $doc->p7;
                $stat7 = $doc->stat_p7;
            }
            if($request->hasFile('p8') && ($request->file('p8')->guessClientExtension() == "pdf"))
            {
            
                $data = $request->all();
                $fnp1 = $request->file('p8')->getClientOriginalName();
                $request->file('p8')->move(public_path().'/dokumen/P/',$fnp1);
                $flnm8 = $fnp1;
                $stat8 = "Sudah Diupload";
            }
            else
            {
                $flnm8 = $doc->p8;
                $stat8 = $doc->stat_p8;;
            }
            
            $data = [
                'p1' => $flnm1,
                'stat_p1' => $stat1,
                'p2' => $flnm2,
                'stat_p2' => $stat2,
                'p3' => $flnm3,
                'stat_p3' => $stat3,
                'p4' => $flnm4,
                'stat_p4' => $stat4,
                'p5' => $flnm5,
                'stat_p5' => $stat5,
                'p6' => $flnm6,
                'stat_p6' => $stat6,
                'p7' => $flnm7,
                'stat_p7' => $stat7,
                'p8' => $flnm8,
                'stat_p8' => $stat8
                ];
                
           
            $doc->update($data);
            return redirect()->back();
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //CRUD Agenda
    public function showList()
    {

        $data['project'] = master::all();
        return view('Staff/Agenda/showList',$data);
    } 

    public function storeAgenda(Request $request)
    {
        $this->validate($request,[
            
            'projectid'=>'required']);

        if(Input::has('tgl_p1'))
        {
             $tgl = strtotime($request->input('tgl_p1'));
             $tgl_p1 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p1 = null;
        }
        if(Input::has('tgl_p2'))
        {
             $tgl = strtotime($request->input('tgl_p2'));
             $tgl_p2 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p2 = null;
        }
        if(Input::has('tgl_p3'))
        {
             $tgl = strtotime($request->input('tgl_p3'));
             $tgl_p3 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p3 = null;
        }
        if(Input::has('tgl_p4'))
        {
             $tgl = strtotime($request->input('tgl_p4'));
             $tgl_p4 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p4 = null;
        }
        if(Input::has('tgl_p5'))
        {
             $tgl = strtotime($request->input('tgl_p5'));
             $tgl_p5 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p5 = null;
        }
        if(Input::has('tgl_p6'))
        {
             $tgl = strtotime($request->input('tgl_p6'));
             $tgl_p6 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p6 = null;
        }
        if(Input::has('tgl_p7'))
        {
             $tgl = strtotime($request->input('tgl_p7'));
             $tgl_p7 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p7 = null;
        }
        if(Input::has('tgl_p8'))
        {
             $tgl = strtotime($request->input('tgl_p8'));
             $tgl_p8 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p8 = null;
        }
        if(Input::has('tgl_kl'))
        {
             $tgl = strtotime($request->input('tgl_kl'));
             $tgl_kl = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_kl = null;
        }
        if(Input::has('tgl_sph'))
        {
             $tgl = strtotime($request->input('tgl_sph'));
             $tgl_sph = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_sph = null;
        }
        

        $base_no = (int)$request->input('no_p');
        $base_format = $request->input('format_p');
        $no_p2 = $base_no.$base_format;
        $base_no++;
        $no_p3 = $base_no.$base_format;
        $base_no++;
        $no_p4 = $base_no.$base_format;
        $base_no++;
        $no_p5 = $base_no.$base_format;
        $base_no++;
        $no_p6 = $base_no.$base_format;
        $base_no++;
        $no_p7 = $base_no.$base_format;
        $base_no++;
        $no_p8 = $base_no.$base_format;
        $base_kl = (int)$request->input('no_kl');
        $base_format = $request->input('format_kl');
        $no_kl = $base_kl.$base_format;
        $base_kl++;

        $data = [
        'projectId'=>$request->input('projectid'),
        'no_p1' => $request->input('no_p1'),
        'tgl_p1' => $tgl_p1,
        'no_p2' => $no_p2,
        'tgl_p2' =>  $tgl_p2,
        'no_p3' => $no_p3,
        'tgl_p3' =>  $tgl_p3,
        'no_p4' => $no_p4,
        'tgl_p4' =>  $tgl_p4,
        'no_p5' => $no_p5,
        'tgl_p5' =>  $tgl_p5,
        'no_p6' => $no_p6,
        'tgl_p6' =>  $tgl_p6,
        'no_p7' => $no_p7,
        'tgl_p7' =>  $tgl_p7,
        'no_p8' => $no_p8,
        'tgl_p8' =>  $tgl_p8,
        'no_kl' =>  $no_kl,
        'tgl_kl' => $tgl_kl,
        'tgl_sph' => $tgl_sph,
        'nmr_sk' => $request->input('nmr_sk')
        ];

        $data1 = [
        'num'=>$base_kl
        ];
        $data2 = [
        'num'=>$base_no
        ];

        $last_kl = td::find('kl');
        $last_kl->update($data1);
        $last_obl = td::find('obl');
        $last_obl->update($data2);


       //var_dump($data);
        
        agenda::create($data);
        return redirect('Staff/agenda/show');
    }


    public function showAgenda()
    {

        $data['agenda'] = \DB::table('agendas')
                   ->join('masters','agendas.projectid','=','masters.id')
                   ->select('agendas.*','agendas.id AS idag','masters.nama_proj','masters.id')
                   ->get();

        
        return view('Staff/Agenda/showagend',$data);

    }

    public function editAgenda($ida,$idp)
    {
        $data['project'] = master::find($idp);
        $data['agenda'] = agenda::find($ida);
        return view('Staff/Agenda/editAg',$data);
    }

     public function updateAgenda(Request $request,$id)
    {
        if(Input::has('tgl_p1'))
        {
             $tgl = strtotime($request->input('tgl_p1'));
             $tgl_p1 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p1 = null;
        }
        if(Input::has('tgl_p2'))
        {
             $tgl = strtotime($request->input('tgl_p2'));
             $tgl_p2 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p2 = null;
        }
        if(Input::has('tgl_p3'))
        {
             $tgl = strtotime($request->input('tgl_p3'));
             $tgl_p3 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p3 = null;
        }
        if(Input::has('tgl_p4'))
        {
             $tgl = strtotime($request->input('tgl_p4'));
             $tgl_p4 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p4 = null;
        }
        if(Input::has('tgl_p5'))
        {
             $tgl = strtotime($request->input('tgl_p5'));
             $tgl_p5 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p5 = null;
        }
        if(Input::has('tgl_p6'))
        {
             $tgl = strtotime($request->input('tgl_p6'));
             $tgl_p6 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p6 = null;
        }
        if(Input::has('tgl_p7'))
        {
             $tgl = strtotime($request->input('tgl_p7'));
             $tgl_p7 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p7 = null;
        }
        if(Input::has('tgl_p8'))
        {
             $tgl = strtotime($request->input('tgl_p8'));
             $tgl_p8 = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_p8 = null;
        }
        if(Input::has('tgl_kl'))
        {
             $tgl = strtotime($request->input('tgl_kl'));
             $tgl_kl = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_kl = null;
        }
        if(Input::has('tgl_sph'))
        {
             $tgl = strtotime($request->input('tgl_sph'));
             $tgl_sph = date("Y-m-d", $tgl);

        }
        else
        {
            $tgl_sph = null;
        }
        

        $no_p1 = $request->input('no_p1');
        $no_p2 = $request->input('no_p2');
        $no_p3 = $request->input('no_p3');
        $no_p4 = $request->input('no_p4');
        $no_p5 = $request->input('no_p5');
        $no_p6 = $request->input('no_p6');
        $no_p7 = $request->input('no_p7');
        $no_p8 = $request->input('no_p8');
        $no_kl = $request->input('no_kl');

        $data = [
        'projectId'=>$request->input('projectid'),
        'no_p1' => $no_p1,
        'tgl_p1' => $tgl_p1,
        'no_p2' => $no_p2,
        'tgl_p2' =>  $tgl_p2,
        'no_p3' => $no_p3,
        'tgl_p3' =>  $tgl_p3,
        'no_p4' => $no_p4,
        'tgl_p4' =>  $tgl_p4,
        'no_p5' => $no_p5,
        'tgl_p5' =>  $tgl_p5,
        'no_p6' => $no_p6,
        'tgl_p6' =>  $tgl_p6,
        'no_p7' => $no_p7,
        'tgl_p7' =>  $tgl_p7,
        'no_p8' => $no_p8,
        'tgl_p8' =>  $tgl_p8,
        'no_kl' =>  $no_kl,
        'tgl_kl' => $tgl_kl,
        'tgl_sph' => $tgl_sph,
        'nmr_sk' => $request->input('nmr_sk')
        ];


       //var_dump($data);
        
        $agenda = agenda::find($id);
        $agenda->update($data);
        return redirect('Staff/agenda/list');
    }

     public function deleteAgenda($id)
    {
        $agenda = agenda::find($id);
        $agenda->delete();
        return redirect('Staff/agenda/list');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //CRUD Data Tender
    public function createTender()
    {
        return view('Staff/Tender/inserttender');
    }

    public function showTender()
    {
        $data['tender'] = jenter::all();
        return view('Staff/Tender/showtender',$data);
    }

    public function editTender($id)
    {
        $data['tender'] = jenter::find($id);
        return view('Staff/Tender/edittender',$data);
    }

    public function updateTender(Request $request,$id)
    {
        $this->validate($request,[
            'jenis'=>'required',
            'activa'=>'required']);
       $data = $request->all();
       $tender = jenter::find($id);
       $tender->update($data);
       return redirect('Staff/tender/show');
    }

    public function storeTender(Request $request)
    {
        $this->validate($request,[
            'jenis'=>'required',
            'activa'=>'required']);
       $data = $request->all();
       jenter::create($data);
       return redirect('Staff');
    }

    public function deleteTender($id)
    {
        $tender = jenter::find($id);
        $tender->delete();
        return redirect('Staff/tender/show');
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //CRUD Witel
    public function createWitel()
    {
        return view('Staff/witel/insertwitel');
    }

    public function showWitel()
    {
        $data['witel'] = witel::all();
        return view('Staff/Witel/showwitel',$data);
    }

    public function updateWitel(Request $request,$id)
    {

    }

    public function storeWitel(Request $request)
    {
        $this->validate($request,[
            'id'=>'required',
            'witel'=>'required',
            'activa'=>'required']);
       $data = $request->all();
       witel::create($data);
       return redirect('Staff');
    }

    public function EditWitel($id)
    {

    }

    public function deleteWitel($id)
    {
        $witel = witel::find($id);
        $witel->delete();
        return redirect('Staff/witel/show');
    }
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Excel Doc Function
    public function uploadExcelproj() 
    {
        return view('Staff/Project/uploadExproj');
    }

    public function uploadExcelagen()
    {
        return view('Staff/Agenda/uploadExagen');
    }

    public function storeExcelagen(Request $request) {
        $data = $request->all();
        $filename  = $request->file('excel')->getClientOriginalName();
        $size      = $request->file('excel')->getSize();
        $extension = $request->file('excel')->guessClientExtension();
        $request->file('excel')->move(public_path().'/dokumen/',$filename);
        
        if($request->hasFile('excel') && ($extension == "xls" || $extension == "xlsx"))
        {
            $data = array(
                'nam_file' =>$filename );
            upload::create($data);
            $this->insertExagen($filename);
            Session::flash('success', 'Upload Berkas Berhasil'); 
            return redirect('Staff/agenda/excelAgen');
        }
        else
        {
             Session::flash('error', 'Upload Gagal'); 
             return redirect('Staff/agenda/excelAgen');
        }
    }

    public function storeExcelproj(Request $request) {
        // checking file is valid.
        $data = $request->all();
        $filename  = $request->file('excel')->getClientOriginalName();
        $size      = $request->file('excel')->getSize();
        $extension = $request->file('excel')->guessClientExtension();
        $request->file('excel')->move(public_path().'/dokumen/',$filename);
        if($request->hasFile('excel') && ($extension == "xls" || $extension == "xlsx"))
        {
            $data = array(
                'nam_file' =>$filename );
            upload::create($data);
            $this->insertExproj($filename);
            Session::flash('success', 'Upload Berkas Berhasil'); 
            return redirect('Staff/agenda/excelAgen');
        }
        else
        {
             Session::flash('error', 'Upload Gagal'); 
             return redirect('Staff/agenda/excelAgen');
        }
    }

    public function insertExproj($filename)
    {
        $excel = \Excel::load('public/dokumen/'.$filename)->get();
        //dump($excel->toArray());
        foreach($excel as $r){
            $result = master::where('id',$r->id_code)
                                            ->first();

                if(is_null($result))
                {
                    $this->fetchExproj($r);
                }
                else if(!is_null($result)){
                    $this->updateExproj($r);
                }
        }
        
    }
    
    public function insertExagen($filename)
    {
        $excel = \Excel::load('public/dokumen/'.$filename)->get();
        foreach($excel as $r){
            $result = agenda::where('id',$r->id_agenda)
                                            ->first();
            $inc = agenda::orderBy('updated_at', 'desc')->first();
                if(is_null($result))
                {
                   $this->fetchExagen($r,$inc);
                }
                else if(!is_null($result)){
                    $this->updateExagen($r);
                }
        }
        
    }

    public function fetchExproj($r)
    {
            $mulai = $this->toDate($r->mulai);
            $sampai = $this->toDate($r->sampai);
            $dellay = $this->toDate($r->delivery_layanan);

            master::create([
            'id' => $r->id_code,
            'witel' => $r->witel,
            'nmr_ao'=>$r->nomor_ao,
            'pelanggan' =>$r->customer,
            'alamat_pelanggan' =>$r->alamat_customer,
            'nama_proj' =>$r->nama_project,
            'lingkup_pekerjaan' =>$r->lingkup_pekerjaan,
            'segmen' =>$r->segmen,
            'jenis_tender' =>$r->jenis_tender,
            'mitra' =>$r->mitra,
            'sub_mitra_pelaksana' =>$r->sub_mitra_pelaksana,
            'masa_kontrak' =>$r->masa_kontrak_layanan,
            'mulai' =>$mulai,
            'sampai' =>$sampai,
            'delivery_layanan' =>$dellay,
            'skema_pembayaran' =>$r->skema_pembayaran,
            'skema_bisnis' =>$r->skema_bisnis,
            'total_revenue' =>$r->total_revenue,
            'revenue_cpe' =>$r->revenue_cpe,
            'beban_cpe' =>$r->beban_cpe,
            'margin_cpe' =>$r->margin_cpe,
            'prosentase' =>$r->prosentase,
            'skema_bisnis' =>$r->skema_bisnis,
            'nilai_sph' =>$r->nilai_sph,
            'nilai_negos' =>$r->nilai_negos,
            'no_kfs' =>$r->no_kfs,
            'tgl_kfs' =>$r->tgl_kfs,
            'progress_tr5' =>$r->progress_tr5,
            'nama_osm' =>$r->nama_osm,
            'nik_osm' =>$r->nik_osm,
            'jab_osm' =>$r->jab_osm,
            'nama_mgr_bid' =>$r->nama_manajer_bidding,
            'nik_mgr_bidding' =>$r->nik_manajer_bidding,
            'jab_bidding' =>$r->jab_bidding,
            'nama_mgr_ebis' =>$r->nama_manajer_ebis,
            'jab_mgr_ebis' =>$r->jab_manajer_ebis,
            'nama_asman_bidd_witel' =>$r->nama_asman_bidding_witel,
            'jab_asman_bid_wit' =>$r->jab_asman_bidding_witel,
            'nama_am' =>$r->nama_am,
            'jab_am' =>$r->jab_am]);
    }

    public function updateExproj($r)
    {

        $mulai =$this->toDate($r->mulai);
        $selesai = $this->toDate($r->sampai);
        $dellay = $this->toDate($r->delivery_layanan);
        $data = [
            'id' => $r->id_code,
            'witel' => $r->witel,
            'nmr_ao'=>$r->nomor_ao,
            'pelanggan' =>$r->customer,
            'alamat_pelanggan' =>$r->alamat_customer,
            'nama_proj' =>$r->nama_project,
            'lingkup_pekerjaan' =>$r->lingkup_pekerjaan,
            'segmen' =>$r->segmen,
            'jenis_tender' =>$r->jenis_tender,
            'mitra' =>$r->mitra,
            'sub_mitra_pelaksana' =>$r->sub_mitra_pelaksana,
            'masa_kontrak' =>$r->masa_kontrak_layanan,
            'mulai' =>$mulai,
            'sampai' =>$selesai,
            'delivery_layanan' =>$dellay,
            'skema_pembayaran' =>$r->skema_pembayaran,
            'skema_bisnis' =>$r->skema_bisnis,
            'total_revenue' =>$r->total_revenue,
            'revenue_cpe' =>$r->revenue_cpe,
            'beban_cpe' =>$r->beban_cpe,
            'margin_cpe' =>$r->margin_cpe,
            'prosentase' =>$r->prosentase,
            'skema_bisnis' =>$r->skema_bisnis,
            'nilai_sph' =>$r->nilai_sph,
            'nilai_negos' =>$r->nilai_negos,
            'no_kfs' =>$r->no_kfs,
            'tgl_kfs' =>$r->tgl_kfs,
            'no_kl' =>$r->no_kl,
            'tgl_kl' =>$r->tgl_kl,
            'progress_tr5' =>$r->progress_tr5,
            'nama_osm' =>$r->nama_osm,
            'nik_osm' =>$r->nik_osm,
            'jab_osm' =>$r->jab_osm,
            'nama_mgr_bid' =>$r->nama_manajer_bidding,
            'nik_mgr_bidding' =>$r->nik_manajer_bidding,
            'jab_bidding' =>$r->jab_bidding,
            'nama_mgr_ebis' =>$r->nama_manajer_ebis,
            'jab_mgr_ebis' =>$r->jab_manajer_ebis,
            'nama_asman_bidd_witel' =>$r->nama_asman_bidding_witel,
            'jab_asman_bid_wit' =>$r->jab_asman_bidding_witel,
            'nama_am' =>$r->nama_am,
            'nama_am' =>$r->jab_am
            ];

        $master = master::find($r->id_code);
        $master->update($data);
    }

    public function fetchExagen($r)
    {
            $tgl_p1 = $this->toDate($r->tgl_p1);
            $tgl_p2 = $this->toDate($r->tgl_p2);
            $tgl_p3 = $this->toDate($r->tgl_p3);
            $tgl_p4 = $this->toDate($r->tgl_p4);
            $tgl_p5 = $this->toDate($r->tgl_p5);
            $tgl_p6 = $this->toDate($r->tgl_p6);
            $tgl_p7 = $this->toDate($r->tgl_p7);
            $tgl_p8 = $this->toDate($r->tgl_p8);
            $tgl_kl = $this->toDate($r->tgl_kl);
            $id;
            $last_obl = (int) $this->toNumber($r->no_p8);
            $last_kl = (int) $this->toNumber($r->no_kl);

        agenda::create([
            'id' => $id_,
            'projectId' => $r->project_id,
            'no_p1'=> $r->no_p1,
            'tgl_p1'=>$tgl_p1,
            'no_p2' =>$r->no_p2,
            'tgl_p2' =>$tgl_p2,
            'no_p3' =>$r->no_p3,
            'tgl_p3' =>$tgl_p3,
            'no_p4' =>$r->no_p4,
            'tgl_p4' =>$tgl_p4,
            'no_p5' =>$r->no_p5,
            'tgl_p5' =>$tgl_p5,
            'no_p6' =>$r->no_p6,
            'tgl_p5' =>$tgl_p5,
            'no_p6' =>$r->no_p6,
            'tgl_p5' =>$tgl_p5,
            'no_p6' =>$r->no_p6,
            'tgl_p6' =>$tgl_p6,
            'no_p7' =>$r->no_p7,
            'tgl_p7' =>$tgl_p7,
            'no_p8' =>$r->no_p8,
            'tgl_p8' =>$tgl_p8,
            'no_kl' =>$r->no_kl,
            'tgl_kl' =>$tgl_kl]);

        $data1 = [
            'num' => $last_kl
            ];
        $data2 = [
            'num' => $last_obl
            ];

            $td = td::find('last_kl');
            $td->update($data1);
            $td = td::find('last_obl');
            $td->update($data2);
    }

    public function updateExagen($r)
    {

            $tgl_p1 = $this->toDate($r->tgl_p1);
            $tgl_p2 = $this->toDate($r->tgl_p2);
            $tgl_p3 = $this->toDate($r->tgl_p3);
            $tgl_p4 = $this->toDate($r->tgl_p4);
            $tgl_p5 = $this->toDate($r->tgl_p5);
            $tgl_p6 = $this->toDate($r->tgl_p6);
            $tgl_p7 = $this->toDate($r->tgl_p7);
            $tgl_p8 = $this->toDate($r->tgl_p8);
            $tgl_kl = $this->toDate($r->tgl_kl);
            $last_obl = (int) $this->toNumber($r->no_p8);
            $last_kl = (int) $this->toNumber($r->no_kl);
        
        $data = [
            'projectId' => $r->project_id,
            'no_p1'=> $r->no_p1,
            'tgl_p1'=>$tgl_p1,
            'no_p2' =>$r->no_p2,
            'tgl_p2' =>$tgl_p2,
            'no_p3' =>$r->no_p3,
            'tgl_p3' =>$tgl_p3,
            'no_p4' =>$r->no_p4,
            'tgl_p4' =>$tgl_p4,
            'no_p5' =>$r->no_p5,
            'tgl_p5' =>$tgl_p5,
            'no_p6' =>$r->no_p6,
            'tgl_p5' =>$tgl_p5,
            'no_p6' =>$r->no_p6,
            'tgl_p5' =>$tgl_p5,
            'no_p6' =>$r->no_p6,
            'tgl_p6' =>$tgl_p6,
            'no_p7' =>$r->no_p7,
            'tgl_p7' =>$tgl_p7,
            'no_p8' =>$r->no_p8,
            'tgl_p8' =>$tgl_p8,
            'no_kl' =>$r->no_kl,
            'tgl_kl' =>$tgl_kl,
            'last_obl' => $last_obl,
            'last_kl' => $last_kl
            ];

        $agenda = agenda::find($r->id_agenda);
        $agenda->update($data);
         $data1 = [
            'num' => $last_kl
            ];
        $data2 = [
            'num' => $last_obl
            ];

            $td = td::find('last_kl');
            $td->update($data1);
            $td = td::find('last_obl');
            $td->update($data2);
    }

    
    public function toExproj()
    {
        $project = master::all();

        \Excel::create('Data Transaksi',function($excel) use ($project)
        {
            $excel->sheet('data transaksi',function($sheet) use ($project)
            {
                $row=1;
                $sheet->row($row,array(
                    'NO','ID CODE','WITEL','NOMOR AO','CUSTOMER','ALAMAT CUSTOMER','NAMA PROJECT','LINGKUP PEKERJAAN','SEGMEN','JENIS TENDER','MITRA','SUB MITRA PELAKSANA','MASA KONTRAK LAYANAN','MULAI','SAMPAI','DELIVERY LAYANAN','SKEMA PEMBAYARAN','SKEMA BISNIS','TOTAL REVENUE','REVENUE CPE','BEBAN CPE','MARGIN CPE','PROSENTASE','NILAI SPH','MILAI NEGOS','NO KFS','TGL KFS','NO KL','TGL KL','PROGRESS TR5','NAMA OSM','NIK OSM','JAB OSM','NAMA MANAJER BIDDING','JAB BIDDING','NAMA MANAJER EBIS','JAB MANAJER EBIS','NAMA ASMAN BIDDING WITEL','JAB ASMAN BIDDING WITEL','NAMA AM','JAB AM'));
                $no=1;
                foreach ($project as $p) {
                    $mulai = $this->DateToIndo($p->mulai);
                    $sampai = $this->DateToIndo($p->sampai);
                    $dellay = $this->DateToIndo($p->delivery_layanan);
                    $sheet->row(++$row,array(
                        $no,
                        $p->id,
                        $p->witel,
                        $p->nmr_ao,
                        $p->pelanggan,
                        $p->alamat_pelanggan,
                        $p->nama_proj,
                        $p->lingkup_pekerjaan,
                        $p->segmen,
                        $p->jenis_tender,
                        $p->mitra,
                        $p->sub_mitra_pelaksana,
                        $p->masa_kontrak,
                        $mulai,
                        $sampai,              
                        $dellay,
                        $p->skema_pembayaran,
                        $p->skema_bisnis,
                        $p->total_revenue,
                        $p->revenue_cpe,
                        $p->beban_cpe,
                        $p->margin_cpe,
                        $p->prosentase, 
                        $p->nilai_sph,
                        $p->nilai_negos, 
                        $p->no_kfs,
                        $p->tgl_kfs,
                        $p->no_kl,
                        $p->tgl_kl, 
                        $p->progress_tr5,                  
                        $p->nama_osm,
                        $p->nik_osm,
                        $p->jab_osm,
                        $p->nama_mgr_bid,
                        $p->nik_mgr_bidding,
                        $p->jab_bidding,
                        $p->nama_mgr_ebis,
                        $p->jab_mgr_ebis,
                        $p->nama_asman_bidd_witel,
                        $p->jab_asman_bid_wit,
                        $p->nama_am,
                        $p->jab_am));
                    $no++;
                }

            });
        })->export('xls');
    }

    public function toExagen()
    {
        $agenda= \DB::table('agendas')
                   ->join('masters','agendas.projectid','=','masters.id')
                   ->select('agendas.*','masters.nama_proj','masters.id as masid')
                   ->get();


        \Excel::create('Data Agenda',function($excel) use ($agenda)
        {
            $excel->sheet('data agenda',function($sheet) use ($agenda)
            {
                $row=1;
                $sheet->row($row,array(
                    'NO','ID AGENDA','PROJECT ID','NAMA PROJECT','NO P1','TGL P1','NO P2','TGL P2','NO P3','TGL P3','NO P4','TGL P4','NO P5','TGL P5','NO P6','TGL P6','NO P7','TGL P7','NO P8','TGL P8','NO KL','TGL KL'));
                $no=1;

                foreach ($agenda as $p){
                        $tgl_p1 = $this->DateToIndo($p->tgl_p1);
                        $tgl_p2 = $this->DateToIndo($p->tgl_p2);
                        $tgl_p3 = $this->DateToIndo($p->tgl_p3);
                        $tgl_p4 = $this->DateToIndo($p->tgl_p4);
                        $tgl_p5 = $this->DateToIndo($p->tgl_p5);
                        $tgl_p6 = $this->DateToIndo($p->tgl_p6);
                        $tgl_p7 = $this->DateToIndo($p->tgl_p7);
                        $tgl_p8 = $this->DateToIndo($p->tgl_p8);
                        $tgl_kl = $this->DateToIndo($p->tgl_kl);
                        $sheet->row(++$row,array(
                            $no,
                            $p->id,
                            $p->projectId,
                            $p->nama_proj,
                            $p->no_p1,
                            $tgl_p1,
                            $p->no_p2,
                            $tgl_p2,
                            $p->no_p3,
                            $tgl_p3,
                            $p->no_p4,
                            $tgl_p4,
                            $p->no_p5,
                            $tgl_p5,
                            $p->no_p6,
                            $tgl_p6,              
                            $p->no_p7,
                            $tgl_p7,
                            $p->no_p8,
                            $tgl_p8,
                            $p->no_kl,
                            $tgl_kl));
                        $no++;
                }

            });
        })->export('xls');
    }
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Date Modification Function
public function DateToIndo($date) {

        if(is_null($date)){
            return $date;
        }
    else
        { 
            $BulanIndo = array("Januari", "Februari", "Maret",
                           "April", "Mei", "Juni",
                           "Juli", "Agustus", "September",
                           "Oktober", "November", "Desember");
    
            $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
            $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
            $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
        
            $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
            return($result);
        }
    }

    public function toDate($date) {
        

        $arr1 = str_split($date);

        $arr2 = (int)count($arr1) - 5;
        $tahun = substr($date,$arr2,5);
        $bulan = substr($date,3,-5);
        $tanggal = substr($date,0,2);
        if($bulan == "Januari" || $bulan == "januari")
        {
            $bulanoke = "01";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
           return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Februari" || $bulan == "februari" || $bulan == "pebruari" || $bulan == "Pebruari")
        {
            $bulanoke = "02";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Maret" || $bulan == "maret")
        {
            $bulanoke = "03";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "April" || $bulan == "april")
        {
            $bulanoke = "04";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Mei" || $bulan == "mei")
        {
            $bulanoke = "05";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Juni" || $bulan == "juni")
        {
            $bulanoke = "06";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Juli" || $bulan == "juli")
        {
            $bulanoke = "07";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Agustus" || $bulan == "agustus")
        {
            $bulanoke = "08";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "September" || $bulan == "september")
        {
            $bulanoke = "09";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Oktober" || $bulan == "oktober")
        {
            $bulanoke = "10";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "November" || $bulan == "november" || $bulan == "Nopember" || $bulan == "nopember")
        {
            $bulanoke = "11";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
            return date("Y-m-d",strtotime($ds));
        }
        if($bulan == "Desember" || $bulan == "desember")
        {
            $bulanoke = "12";
            $ds = $tahun."/".$bulanoke."/".$tanggal;
           return date("Y-m-d",strtotime($ds));
        }
    }

     public function dateConverter($date)
    {
        if($date == NULL){
            return NULL;
        }
        else{
        $indt = strtotime($date);
        $resdt = date("Y-m-d",$indt);
        return $resdt;
        }
    }

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function toNumber($Number)
    {
         $arr1 = str_split($Number);
         $num = substr($Number,0,2);
         return $num;
    }
    
//Agenda
    public function insertAgenda($id)
    {
        $res = agenda::where('projectId',$id)->first();

        if(is_null($res))
        {
            $data['project'] = master::find($id);
            return view('Staff/Agenda/insertAg',$data);
        }
        elseif(!is_null($res))
        {
            Session::flash('error', 'Data Agenda pada project '.$id.' sudah ada');
            return redirect()->back();
        }
       
        return view('Staff/Agenda/insertAg',$data);
    }

//Alert
    public function insertAlert($id,$prid)
    {
        $projecte = master::find($prid);
        $data = [
            'stat_pr' => 0
        ];
        $projecte->update($data);
        $alerto = alert::find($id);
        $alerto->delete();
        return redirect('Staff/proj/insert');
    }

    public function deleteAlert($id,$prid)
    {
        $alerto = alert::find($id);
        $projecte = master::find($prid);
        $data = [
            'stat_pr' => 0
        ];
        $projecte->update($data);
        $alerto->delete();
        return redirect('Staff');
    }

}

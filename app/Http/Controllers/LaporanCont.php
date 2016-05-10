<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use fpdf;

class LaporanCont extends Controller
{
    
    public function pdf()
    {
        //
        $pdf = new \fpdf\FPDF('Landscape','mm','A4'); 
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(40,8,'NIS',1,0);
        $pdf->Cell(40,8,'Nama Siswa',1,0);
        $pdf->Cell(20,8,'Kelas',1,0);
        $pdf->Cell(40,8,'Mapel ',1,0);
        $pdf->Cell(30,8,'Status ',1,0);
        $pdf->Cell(40,8,'Tanggal',1,0);
        $pdf->Cell(40,8,'Guru Mapel',1,1);


       $absensi = \DB::table('absensis')
                   ->join('siswas','absensis.siswaid','=','siswas.id')
                   ->join('kelas','absensis.idkelas','=','kelas.id')
                   ->select('absensis.*','siswas.id','siswas.namsis','kelas.namkelas','absensis.mapel','absensis.created_at')
                   ->get();

         $pdf->SetFont('Arial','',11);
        foreach ($absensi as $t) {
        $pdf->Cell(40,8,$t->id,1,0);
        $pdf->Cell(40,8,$t->namsis,1,0);
        $pdf->Cell(20,8,$t->namkelas,1,0);
        $pdf->Cell(40,8,$t->mapel,1,0);
        $pdf->Cell(30,8,$t->status_abs,1,0);
        $pdf->Cell(40,8,$t->created_at,1,0);
        $pdf->Cell(40,8,Auth::user()->name,1,1);
        }
        $pdf->Output();
        die;
    }


}


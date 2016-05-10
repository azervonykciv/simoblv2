<?php

function tgl_ind($date)
{



	if(is_null($date)){
		return "Belum diinput";
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

function dates($date)
{
	if(is_null($date))
	{
		return null;
	}
	elseif(!is_null($date))
	{
		return date('d-m-Y',strtotime($date));
	}
}


?>
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master extends Model
{
    protected $fillable = ['id', 'witel', 'nmr_ao','pelanggan',
    'alamat_pelanggan','nama_proj','lingkup_pekerjaan','segmen',
    'jenis_tender','mitra','sub_mitra_pelaksana','masa_kontrak','mulai',
    'sampai','delivery_layanan','skema_pembayaran','nilai_sph','nilai_negos','total_revenue',
    'revenue_cpe','beban_cpe','margin_cpe','prosentase','skema_bisnis',
    'nama_osm','nik_osm','jab_osm','nama_mgr_bidding','nik_mgr_bidding','jab_bidding',
    'nama_mgr_ebis','jab_mgr_ebis','nama_asman_bidd_witel','jab_asman_bid_wit'
    ,'nama_am','jab_am','no_kfs','tgl_kfs','sk_hr','sk_bln','stat_pr'];

    
}

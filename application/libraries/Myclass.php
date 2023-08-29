<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myclass {

	public function bulan_indo($bulan)
    {
    	$b = "";	
    	switch ($bulan) {
    		case 1: $b = "Januari"; break;
    		case 2: $b = "Februari"; break;
    		case 3: $b = "Maret"; break;
    		case 4: $b = "April"; break;
    		case 5: $b = "Mei"; break;
    		case 6: $b = "Juni"; break;
    		case 7: $b = "Juli"; break;
    		case 8: $b = "Agustus"; break;
    		case 9: $b = "September"; break;
    		case 10: $b = "Oktober"; break;
    		case 11: $b = "November"; break;
    		case 12: $b = "Desember"; break;
    	}
    	return $b;
    }

    public function bulan_tahun_indo($bulan,$tahun)
    {
    	return $this->bulan_indo($bulan)." ".$tahun;
    }
}
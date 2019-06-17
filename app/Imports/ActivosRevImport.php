<?php

namespace App\Imports;

use App\ActivoRev;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Carbon\Carbon;

class ActivosRevImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    use Importable;

    public function model(array $row)
    {

        if (!(int) $row[4]) {
            return null;
        }

        $xls_date1 = $row[4];
        //dd( $row[4]);
        $unix_date1 = ($xls_date1 - 25569) * 86400;
        $xls_date1 = 25569 + ($unix_date1 / 86400);
        $unix_date1 = ($xls_date1 - 25569) * 86400;

        $xls_date2 = $row[10];
        $unix_date2 = ($xls_date2 - 25569) * 86400;
        $xls_date2 = 25569 + ($unix_date2 / 86400);
        $unix_date2 = ($xls_date2 - 25569) * 86400;
        return new ActivoRev([
            'codigo'        => $row[0],
            'act_des'       => $row[1],
            'act_des_det'   => $row[2],
            'act_can'       => $row[3],
            'act_fec_adq'   => date('Y-m-d', (int) $unix_date1),
            'act_par_cod'   => $row[5],
            'act_vida_util' => $row[6],
            'act_estado'    => $row[7],
            'act_ges'       => $row[8],
            'act_ofc_cod'   => $row[9],
            'fec_cre'       => date('Y-m-d', (int) $unix_date2),
            'act_imp_bs'    => $row[11],
            'uni_med'       => $row[12],

        ]);
    }
}

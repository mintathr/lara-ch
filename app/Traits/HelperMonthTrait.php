<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait HelperMonthTrait
{
    public function cekMonth()
    {
        $dt                     = Carbon::now()->toDateString();
        $sunday                 = Carbon::now()->startOfWeek(Carbon::SUNDAY);
        $saturday               = Carbon::now()->endOfWeek(Carbon::SATURDAY);
        $end_sunday               = Carbon::now()->endOfWeek(Carbon::SUNDAY);
        $from_sunday_date       = $sunday->format('d');
        $from_sunday_month      = $sunday->format('m');
        $from_sunday_listMonth  = $sunday->month;
        $from_sunday_year       = $sunday->year;
        $to_saturday_date       = $saturday->format('d');
        $to_saturday_month      = $saturday->format('m');
        $to_saturday_listMonth  = $saturday->month;
        $to_saturday_year       = $saturday->year;
        //
        $to_sunday_date       = $end_sunday->format('d');
        $to_sunday_month      = $end_sunday->format('m');
        $to_sunday_listMonth  = $end_sunday->month;
        $to_sunday_year       = $end_sunday->year;
        
        $list_month = [
                ['dow' => 0, 'day' => ''],
                ['dow' => 1, 'day' => 'Januari'],
                ['dow' => 2, 'day' => 'Pebruari'],
                ['dow' => 3, 'day' => 'Maret'],
                ['dow' => 4, 'day' => 'April'],
                ['dow' => 5, 'day' => 'Mei'],
                ['dow' => 6, 'day' => 'Juni'],
                ['dow' => 7, 'day' => 'Juli'],
                ['dow' => 8, 'day' => 'Agustus'],
                ['dow' => 9, 'day' => 'September'],
                ['dow' => 10, 'day' => 'Oktober'],
                ['dow' => 11, 'day' => 'November'],
                ['dow' => 12, 'day' => 'Desember'],
        ];
        

        $from_month_id = $list_month[$from_sunday_listMonth]['day'];
        $to_month_id   = $list_month[$to_saturday_listMonth]['day'];
        $to_month_id_sunday   = $list_month[$to_sunday_listMonth]['day'];

        return [
            'dt'                    => $dt,
            'sunday'                => $sunday,
            'saturday'              => $saturday,
            'end_sunday'              => $end_sunday,
            'from_sunday_date'      => $from_sunday_date,
            'from_sunday_month'     => $from_sunday_month,
            'from_sunday_year'      => $from_sunday_year,
            'to_saturday_date'      => $to_saturday_date,
            'to_saturday_month'     => $to_saturday_month,
            'to_saturday_year'      => $to_saturday_year,
            'to_sunday_date'      => $to_sunday_date,
            'to_sunday_month'     => $to_sunday_month,
            'to_sunday_year'      => $to_sunday_year,
            'list_month'            => $list_month,
            'from_month_id'         => $from_month_id,
            'to_month_id'           => $to_month_id,
            'to_month_id_sunday'           => $to_month_id_sunday,
        ];
    }
}

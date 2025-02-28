<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comparison extends Model
{
    protected $table = 'comparisons';
    protected $fillable = ['input1', 'input2', 'percentage'];

    public static function comparisons($input1, $input2)
    {
        $input1 = strtoupper($input1);
        $input2 = strtoupper($input2);

        // Hitung persentase kemunculan karakter
        $uniqueChars = array_unique(str_split($input1));
        var_dump($uniqueChars);
        
        $count = 0;
        foreach ($uniqueChars as $char) {
            if (strpos($input2, $char) !== false) {
                $count++;
            }
        }
        // dd($uniqueChars,strlen($input1),$count);
        
        return round(($count / strlen($input1)) * 100,2);
    }
}

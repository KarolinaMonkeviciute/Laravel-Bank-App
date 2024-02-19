<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'code',
    ];

    public function accounts(){
        return $this->hasMany(Account::class);
    }

    protected static $sorts = [
        'no_sort' => 'Nerūšiuota',
        'name_asc' => 'Pavardė (A-Z)',
        'name_desc' => 'Pavardė (Z-A)',
        'balance_asc' => 'Sąskaitų likutis (didėjimo tvarka)',
        'balance_desc' => 'Sąskaitų likutis (mažėjimo tvarka)',
        'zero_accounts' => 'Klientai be sąskaitų',
    ];

    public static function getSorts()
    {
        return self::$sorts;
    }
}


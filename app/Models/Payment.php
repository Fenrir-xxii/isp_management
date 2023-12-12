<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property int $id
 * @property Carbon $datetime
 * @property int $individual_client_id
 * @property int $corporate_client_id
 * @property float $amount
 * @property float $balance_before
 * @property float $balance_after
 * 
 */

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'datetime',
        'amount'
    ];
    public function getDates()
    {
        return [
            'datetime'
        ];
    }
    public function individual_client()
    {
        return $this->belongsTo(IndividualClient::class);
    }
    public function corporate_client()
    {
        return $this->belongsTo(CorporateClient::class);
    }
}

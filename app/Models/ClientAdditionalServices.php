<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $client_main_service_id
 * @property int $additional_option_id
 * @property int $status_id
 */
class ClientAdditionalServices extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_main_service_id',
        'additional_option_id',
        'status_id'
    ];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function main_service()
    {
        return $this->belongsTo(ClientMainServices::class);
    }
    public function additionalOption()
    {
        return $this->belongsTo(AdditionalOption::class);
    }
}

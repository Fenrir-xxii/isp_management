<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $tariff_id
 * @property int|null $individual_client_id
 * @property int|null $corporate_client_id
 * @property int $contract_id
 * @property int $status_id
 */
class ClientMainServices extends Model
{
    use HasFactory;
    protected $fillable = [
       'tariff_id',
       'individual_client_id',
       'corporate_client_id',
       'contract_id',
       'status_id'
    ];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }
    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
    public function individual_client()
    {
        return $this->belongsTo(IndividualClient::class);
    }
    public function corporate_client()
    {
        return $this->belongsTo(CorporateClient::class);
    }
    // public function additional_services()
    // {
    //     return $this->hasMany(ClientAdditionalServices::class);
    // }
}

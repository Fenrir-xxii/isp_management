<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $crn
 * @property string $address
 * @property string $phone
 * @property string $e_mail
 * @property float $balance
 * @property string $username
 * @property int $tariff_id
 * @property int $status_id
 * @property string $contact_name
 */
class CorporateClient extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'crn',
        'address',
        'phone',
        'e_mail',
        'balance',
        'username',
        'contact_name',
        'tariff_id',
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
    // public function additionaOption()
    // {
    //     return $this->belongsTo(Tariff::class);
    // }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

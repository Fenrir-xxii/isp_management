<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $age
 * @property string $address
 * @property string $phone
 * @property string $e_mail
 * @property float $balance
 * @property string $username
 * @property int $tariff_id
 * @property int $status_id
 * 
 */
class IndividualClient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'address',
        'phone',
        'e_mail',
        'balance',
        'username',
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
    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }
    // public function additionalOptions(){
    //     return $this->hasMany(AdditionalOption::class);
    // }
    // public function payments()
    // {
    //     return $this->hasManyThrough(Payment::class);
    // }
}

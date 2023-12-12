<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $max_speed
 * @property float $price
 * 
 */

class Tariff extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'max_speed',
        'price'
    ];
    public function individual_clients(){
        return $this->hasMany(IndividualClient::class);
    }
    public function corporate_clients(){
        return $this->hasMany(CorporateClient::class);
    }
}

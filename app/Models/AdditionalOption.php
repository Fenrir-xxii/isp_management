<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property string $title
 * @property float $price
 * @property string $description
 */
class AdditionalOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'price',
        'description'
    ];
    public function individual_clients(){
        return $this->hasMany(IndividualClient::class);
    }
    public function corporate_clients(){
        return $this->hasMany(CorporateClient::class);
    }
}

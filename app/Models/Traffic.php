<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * @property int $id
 * @property Carbon $datetime
 * @property int $downloaded_bytes
 * @property int $uploaded_bytes
 * @property int $individual_client_id
 * @property int $corporate_client_id
 * 
 */
class Traffic extends Model
{
    use HasFactory;
    protected $fillable = [
        'datetime'
    ];
}

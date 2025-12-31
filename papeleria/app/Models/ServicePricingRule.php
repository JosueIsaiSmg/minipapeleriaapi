<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class ServicePricingRule extends Model
{
    protected $fillable = [
        'service_id','condition_type','condition_value',
        'min_quantity','max_quantity','material','size','doc_type','price'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

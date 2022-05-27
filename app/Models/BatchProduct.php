<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $batch_id
 * @property integer $product_id
 * @property string $created_at
 * @property string $updated_at
 * @property Batch $batch
 * @property Product $product
 */
class BatchProduct extends Model
{
    protected $table = 'batch_product';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function batch()
    {
        return $this->belongsTo('App\Models\Batch');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

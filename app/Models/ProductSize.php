<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $product_id
 * @property integer $size_id
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property Size $size
 */
class ProductSize extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products_sizes';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $colour_id
 * @property integer $product_id
 * @property string $created_at
 * @property string $updated_at
 * @property Colour $colour
 * @property Product $product
 */
class ColourProduct extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'colours_products';

    /**
     * @var array
     */
    protected $fillable = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function colour()
    {
        return $this->belongsTo('App\Models\Colour');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

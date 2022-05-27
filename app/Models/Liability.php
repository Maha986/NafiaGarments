<?php

namespace App\Models;
use App\Observers\LiabilityObserver;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property float $amount
 * @property string $date
 * @property string $created_at
 * @property string $updated_at
 * @property Category $category
 */
class Liability extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        Liability::observe(LiabilityObserver::class);

    }

    /**
     * @var array
     */
    protected $fillable = ['category_id', 'guid','name', 'amount', 'date', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

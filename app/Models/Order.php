<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static where(string $string, int $id)
 */
class Order extends Model
{
    protected array $fillable = [
        'user_id',
        'billing_email',
        'billing_name',
        'billing_address',
        'billing_phone',
        'billing_district',
        'billing_province',
        'billing_postcode',
        'billing_subtotal'
    ];

    /**
     * @return BelongsTo
     */
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}

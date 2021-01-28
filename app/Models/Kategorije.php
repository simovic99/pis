<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $naziv
 * @property Product[] $products
 */
class Kategorije extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategorije';

    /**
     * @var array
     */
    protected $fillable = ['naziv'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'kategorija_id');
    }
}

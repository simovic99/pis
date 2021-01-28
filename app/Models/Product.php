<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @property int $id
 * @property int $kategorija_id
 * @property integer $opg_id
 * @property string $naziv
 * @property string $opis
 * @property float $cijena
 * @property Kategorije $kategorije
 * @property Opg $opg
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['kategorija_id', 'opg_id', 'naziv','img', 'opis', 'cijena'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategorije()
    {
        return $this->belongsTo('App\Kategorije', 'kategorija_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function opg()
    {
        return $this->belongsTo('App\Opg');
    }
}

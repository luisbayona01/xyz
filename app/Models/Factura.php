<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Factura
 *
 * @property $id
 * @property $id_cliente
 * @property $fecha
 * @property $cantidad
 * @property $impuesto
 * @property $id_producto
 * @property $subtotal
 *
 * @property Producto $producto
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Factura extends Model
{

public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table = 'factura';

    static $rules = [
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_cliente','fecha','cantidad','impuesto','id_producto','subtotal'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function producto()
    {
        return $this->hasOne('App\Models\Producto', 'id', 'id_producto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'id_cliente');
    }


}

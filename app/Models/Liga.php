<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Liga
 *
 * @property $id
 * @property $nombre
 * @property $logo
 * @property $tipo
 * @property $estado
 * @property $temporadas
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo[] $equipos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Liga extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'logo' => 'required',
		'tipo' => 'required',
		'estado' => 'required',
		'temporadas' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','logo','tipo','estado','temporadas'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos()
    {
        return $this->hasMany('App\Models\Equipo', 'liga_id', 'id');
    }
    

}

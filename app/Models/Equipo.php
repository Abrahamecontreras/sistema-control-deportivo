<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Equipo
 *
 * @property $id
 * @property $nombre
 * @property $liga_id
 * @property $foto
 * @property $created_at
 * @property $updated_at
 *
 * @property Jugadore[] $jugadores
 * @property Liga $liga
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Equipo extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'liga_id' => 'required',
		'foto' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','liga_id','foto'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jugadores()
    {
        return $this->hasMany('App\Models\Jugadore', 'equipo_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function liga()
    {
        return $this->hasOne('App\Models\Liga', 'id', 'liga_id');
    }
    

}

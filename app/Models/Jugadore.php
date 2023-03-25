<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jugadore
 *
 * @property $id
 * @property $nombre
 * @property $equipo_id
 * @property $num_playera
 * @property $posicion
 * @property $foto
 * @property $created_at
 * @property $updated_at
 *
 * @property Equipo $equipo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Jugadore extends Model
{

  static $rules = [
    'nombre' => 'required',
    'equipo_id' => 'required',
    'num_playera' => 'required',
    'posicion' => 'required',
    'foto' => 'required',
  ];

  static $rulesEdit = [
    'nombre' => 'required',
    'equipo_id' => 'required',
    'num_playera' => 'required',
    'posicion' => 'required',
  ];



  protected $perPage = 20;

  /**
   * Attributes that should be mass-assignable.
   *
   * @var array
   */
  protected $fillable = ['nombre', 'equipo_id', 'num_playera', 'posicion', 'foto'];


  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function equipo()
  {
    return $this->hasOne('App\Models\Equipo', 'id', 'equipo_id');
  }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(required={"name"}, @SWG\Xml(name="Store"))
 */

class Store extends Model
{
  /**
   * @SWG\Property(example="1")
   * @var string
   */
  public $id;
    /**
     * @SWG\Property(example="YOGYA SUNDA 60")
     * @var string
     */
    public $name;

    /**
     * @SWG\Property(example="102")
     * @var string
     */
    public $store_code;

    /**
     * @SWG\Property(example="S60")
     * @var string
     */
    public $initial;

    /**
     * @SWG\Property(example="JL. SUNDA NO. 56 - 62")
     * @var string
     */
    public $address;

    /**
     * @SWG\Property(example="BANDUNG")
     * @var string
     */
    public $city;

    /**
     * @SWG\Property(example="022-4200510-12")
     * @var string
     */
    public $phone;

    /**
     * @SWG\Property(example="2")
     * @var string
     */
    public $region;

    /**
     * @SWG\Property(format="date-time")
     * @var string
     */
    public $created_at;

    /**
     * @SWG\Property(format="date-time")
     * @var string
     */
    public $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'store_code', 'initial', 'address', 'city', 'phone', 'region', 'created_at', 'updated_at'];
}

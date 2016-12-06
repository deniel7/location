<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(required={"name"}, @SWG\Xml(name="City"))
 */
class City extends Model
{
    /**
     * @SWG\Property(example="1")
     *
     * @var string
     */
    public $id;
    /**
     * @SWG\Property(example="BADUNG, KAB.")
     *
     * @var string
     */
    public $name;

    /**
     * @SWG\Property(example="1")
     *
     * @var string
     */
    public $_province_id;

    /**
     * @SWG\Property(format="date-time")
     *
     * @var string
     */
    public $created_at;

    /**
     * @SWG\Property(format="date-time")
     *
     * @var string
     */
    public $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'province_id', 'created_at', 'updated_at'];

    /**
     * Get the province that owns the city.
     *
     * @Relation
     */
    public function province()
    {
        return $this->belongsTo('App\Province', 'province_id');
    }

    /**
     * Get the districts for the city.
     *
     * @Relation
     */
    public function districts()
    {
        return $this->hasMany('App\District', 'city_id');
    }
}

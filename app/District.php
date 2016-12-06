<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(required={"name"}, @SWG\Xml(name="District"))
 */
class District extends Model
{
    /**
     * @SWG\Property(example="1")
     *
     * @var string
     */
    public $id;
    /**
     * @SWG\Property(example="ABIANSEMAL")
     *
     * @var string
     */
    public $name;

    /**
     * @SWG\Property(example="1")
     *
     * @var string
     */
    public $_city_id;

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
    protected $fillable = ['name', 'city_id', 'created_at', 'updated_at'];

    /**
     * Get the city that owns the district.
     *
     * @Relation
     */
    public function city()
    {
        return $this->belongsTo('App\City', 'city_id');
    }

    /**
     * Get the zipcodes for the district.
     *
     * @Relation
     */
    public function zipcodes()
    {
        return $this->hasMany('App\Zipcode', 'district_id');
    }
}

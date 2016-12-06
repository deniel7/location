<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(required={"name"}, @SWG\Xml(name="Zipcode"))
 */
class Zipcode extends Model
{
    /**
     * @SWG\Property(format="int64")
     *
     * @var int
     */
    public $id;

    /**
     * @SWG\Property(example="BOGOR, 45257")
     *
     * @var string
     */
    public $name;

    /**
     * @SWG\Property(example="1000")
     *
     * @var string
     */
    public $_district_id;

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
    protected $fillable = ['name', 'district_id', 'created_at', 'updated_at'];

    /**
     * Get the post that owns the zipcode.
     *
     * @Relation
     */
    public function district()
    {
        return $this->belongsTo('App\District', 'district_id');
    }
}

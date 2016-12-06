<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(required={"name"}, @SWG\Xml(name="Province"))
 */
class Province extends Model
{
    /**
     * @SWG\Property(example="1")
     *
     * @var string
     */
    public $id;

    /**
     * @SWG\Property(example="BALI")
     *
     * @var string
     */
    public $name;

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
    protected $fillable = ['name', 'created_at', 'updated_at'];

    /**
     * Get the cities for the province.
     *
     * @Relation
     */
    public function cities()
    {
        return $this->hasMany('App\City', 'province_id');
    }
}

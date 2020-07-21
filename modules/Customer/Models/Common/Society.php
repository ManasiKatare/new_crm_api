<?php 

namespace Modules\Customer\Models\Common;

use Modules\Core\Models\BaseModel as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Customer\Models\Common\Traits\Relationship\SocietyRelationship;
use Modules\Core\Models\Common\Traits\Relationship\MapCountryDataRelationship;

/**
 * Eloquent Model for the Currency
 */
class Society extends Model {

    use MapCountryDataRelationship;
    use SocietyRelationship;
    use SoftDeletes;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'locality', 'city', 'state_id', 'country_id', 'zipcode', 
        'google_place_id', 'longitude', 'latitude',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'state_id', 'country_id',
        'google_place_id', 'longitude', 'latitude',
        'created_by', 'updated_by', 'deleted_by',
        'created_at', 'updated_at', 'deleted_at'
    ];


    /**
     *
     * @var array
     */
    protected $dates = [
        'created_at', 'updated_at', 'deleted_by', 'last_updated_at'
    ];


    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['last_updated_at'];


    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['country'];


    /**
     * Default constructor
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = config('omnicrm-migration.table_name.customer.society_address');
    }

} //Class ends
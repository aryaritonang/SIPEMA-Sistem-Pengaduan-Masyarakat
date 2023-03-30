<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id_user
 * @property int    $age
 * @property int    $nik
 * @property string $complaint_contents
 * @property string $complaint_category
 */
class Complaint extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'complaint';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'age', 'nik', 'complaint_contents', 'complaint_category', 'attachment'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_user' => 'int', 'age' => 'int', 'nik' => 'int', 'complaint_contents' => 'string', 'complaint_category' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
    public function status()
    {
        return $this->hasOne(ComplaintStatus::class, 'complaint_number', 'id');
    }
}

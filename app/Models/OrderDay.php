<?php namespace Doenerbank\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDay extends Model {

	protected $table = "order_days";

    protected $fillable = [
        'date_of_order'
    ];

    public function manager()
    {
        return $this->hasOne('User', 'id', 'manager_id');
    }
}

<?php namespace Doenerbank\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

	protected $table = "orders";

    protected $fillable = [
        'date',
        'allocated_user',
        'is_closed'
    ];

    public function allocatedUser()
    {
        return $this->hasOne('Doenerbank\Models\User', 'id', 'allocated_user');
    }

    public function orderLines()
    {
        return $this->hasMany('Doenerbank\Models\OrderLine', 'order_id', 'id');
    }
}

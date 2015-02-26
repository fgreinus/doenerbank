<?php namespace Doenerbank\Models;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model {

    protected $table = "order_lines";

	protected $fillable = [
        'order_id',
        'user_id',
        'article_id',
        'amount',
        'notes'
    ];

    public function order() {
        return $this->belongsTo('Doenerbank\Models\Order', 'order_id', 'id');
    }

    public function user() {
        return $this->belongsTo('Doenerbank\Models\User', 'user_id', 'id');
    }

    public function article() {
        return $this->belongsTo('Doenerbank\Models\Article', 'article_id', 'id');
    }

}

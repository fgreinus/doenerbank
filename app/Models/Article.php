<?php namespace Doenerbank\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = [
        'name',
        'price'
    ];

    public function orderLines()
    {
        return $this->belongsToMany('Doenerbank\Models\OrderLines');
    }
}

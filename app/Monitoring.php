<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Monitoring extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'monitoring';
    
    protected $fillable = [
          'proponent_name',
          'proponent_alias'
    ];
    

    public static function boot()
    {
        parent::boot();

        Monitoring::observe(new UserActionsObserver);
    }
    
    
    
    
}
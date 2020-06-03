<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;

class Ad extends Model
{

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'ads';



    protected $fillable = [
        'id', 'category_id','sender','status','company_id','title','message','active','badge_id','visibility','place_id','city','administrative'
        ,'phone','email','price'

    ];


    public function badge(){
        return $this->hasOne('App\Domain\Company\Models\Badge','id','badge_id');

    }
    public function getSender(){
        return $this->hasOne(\App\Containers\User\Models\User::class,'id','sender');

    }
    public function getAddressant(){
        return $this->hasOne('App\User','id','addressant');

    }
    public function manager(){

        return $this->hasOneThrough('App\Domain\Manager\Models\Manager', 'App\Domain\Customer\Models\Customer','user_id','id','addressant','manager_id');

    }

    public function pictures(){
        return $this->hasMany(\App\Containers\Ad\Models\Picture::class);

    }

    public function parentCategory(){
        return $this->hasOne('\App\Domain\Customer\Models\ProductCategory','id','category_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'number'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function editNumber($number = false, $description = false)
    {
        if($number){
            $this->number = $number;
        }

        if($description){
            $this->description = $description;

        }

        $this->save();
    }

    /**
     * @throws \Exception
     */
    public function deletePhone()
    {
        $this->delete();
    }

}

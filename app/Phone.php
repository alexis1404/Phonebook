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

    public function editNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @throws \Exception
     */
    public function deletePhone()
    {
        $this->delete();
    }

}

<?php

namespace Laraveldesign\Votes\Models;

use Illuminate\Database\Eloquent\Model;

/*
 * Model used to store votes.
 */

class Vote extends Model
{
    /*
     * Allow system to fill metadata
     */
    protected $fillable = [
        'user_id',
        'model_id',
        'model_class',
        'value'
    ];
}

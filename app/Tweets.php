<?php

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{
    //
    
    protected $table = 'tweets';
    
    protected $fillable = [
        'hashtag',
        'total'
    ];
    
}
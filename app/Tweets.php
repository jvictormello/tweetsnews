<?php

namespace App;

use \Eloquent;

class Tweets extends Eloquent
{
    
    public function __construct() {
        $this->connection = 'mysql';
    }
    
    protected $table = 'tweets';
    
    protected $fillable = [
        'hashtag',
        'total'
    ];
    
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = ['card_id', 'author', 'body'];

    public function main()
    {
        return $this->belongsTo(TuningCardModel::class);
    }
}

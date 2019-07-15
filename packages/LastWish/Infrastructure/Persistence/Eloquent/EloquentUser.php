<?php

namespace packages\LastWish\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class EloquentUser extends Model
{
    protected $table = 'users';

    protected $guarded = [];
}

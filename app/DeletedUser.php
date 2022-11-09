<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeletedUser extends Model
{
    protected $table = 'deleted_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'dept',
        'rank',
        'phone',
        'room'
    ];

    protected $primaryKey = 'email';

    public $incrementing = false;

    protected $keyType = 'string';
}

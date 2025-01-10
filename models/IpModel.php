<?php namespace NielsVanDenDries\AgeVerification\Models;

use Model;

class IpModel extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'nielsvandendries_ageverification_ip';

    public $rules = [
    ];

    protected $fillable = ['ip'];
}
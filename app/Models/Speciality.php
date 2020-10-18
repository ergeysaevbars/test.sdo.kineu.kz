<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;

    /**
     * @var $table - Название таблицы
     */
    protected $table = 'kv_spec';

    public function groups()
    {
        return $this->hasMany(Group::class, 'spec_name', 'name')->active();
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
    use HasFactory;

    protected $table = 'specialnost';
    protected $primaryKey = 'spec_id';

    public function specialnost()
    {
        return $this->belongsTo(Speciality::class, 'name', 'spec_name');
    }

    public function scopeActive($query)
    {
        return $query->where(function ($query) {
            $query->where(function ($query) {
                $query->where('spec_year', Carbon::now()->year - (Carbon::now()->month > 8 ? 3 : 4))
                    ->where('spec_forma', 'like', '%базовая%');
            })->orWhere(function ($query) {
                $query->where('spec_year', Carbon::now()->year - (Carbon::now()->month > 8 ? 2 : 3))
                    ->where(function ($query) {
                        $query->where('spec_forma', 'like', '%базовая%')
                            ->orWhere('spec_forma', 'like', '%сокращенная%');
                    });
            })->orWhere(function ($query){
                $query->where('spec_year', Carbon::now()->year - (Carbon::now()->month > 8 ? 1 : 2))
                    ->where('spec_forma', 'not like', '%1 год%');
            })->orWhere('spec_year', Carbon::now()->year - (Carbon::now()->month > 8 ? 0 : 1));
        })->orderBy('spec_year')->orderBy('spec_forma');
    }

    public function groupName()
    {
        return DB::selectOne("SELECT 	get_group_name_by_spec_id(?) `group` FROM specialnost", [$this->spec_id])->group;
    }
}

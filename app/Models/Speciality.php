<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Speciality extends Model
{
    use HasFactory;

    /**
     * @var $table - Название таблицы
     */
    protected $table = 'kv_spec';

    /*public function groups()
    {
        return $this->hasMany(Group::class, 'spec_name', 'name')->active();
    }*/

    public function groups()
    {
        $year = Carbon::now()->year - (Carbon::now()->month > 8 ? 0 : 1);
        return DB::select("SELECT * FROM (
                                  SELECT spec_id, get_group_name_by_spec_id(spec_id) gruppa FROM specialnost sp 
                                  INNER JOIN kv_spec ON name = spec_name 
                                  WHERE ((sp.spec_year = $year - 3 AND sp.spec_forma LIKE '%базовая%') OR 
                                   (sp.spec_year = $year - 2 AND (sp.spec_forma LIKE '%сокращ%' OR sp.spec_forma LIKE '%базовая%')) OR 
                                   (sp.spec_year = $year - 1 AND sp.spec_forma NOT LIKE '%1 год%') OR (sp.spec_year = $year))
                                  AND id = ?) t ORDER BY gruppa", [$this->id]);
    }
}

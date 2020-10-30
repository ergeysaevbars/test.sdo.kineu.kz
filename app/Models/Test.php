<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Класс для названий тестов
 *
 * @property integer $id
 * @property string $name_test - Название теста
 * @property integer $user_id - Пользователь, загрузивший тест
 * @property integer $type_test - Тип теста
 * @property string $shifr_test - Шифр теста
 * @property Carbon $load_date - Дата создания теста
 * @property integer $is_checked - Проверен тест или нет
 *
 * Class Test
 * @package App\Models
 */
class Test extends Model
{
    use HasFactory;

    /**
     * @var $table - Название таблицы
     */
    protected $table = 'kv_tests_name';

    protected $fillable = ['name_test', 'type_test'];

    public $timestamps = false;

    public function type()
    {
        return $this->belongsTo(TestsType::class, 'type_test');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'id_test');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, 'speciality_test', 'test_id', 'speciality_id');
    }
}

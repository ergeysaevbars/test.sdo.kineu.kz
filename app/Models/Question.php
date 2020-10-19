<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Класс с вопросами тестов
 *
 * @property integer $id
 * @property integer $id_test - id теста из таблицы kv_tests_name
 * @property integer $nom_vop_disc - Порядковый номер вопроса в тесте
 * @property string $vopros - Вопрос
 * @property string $otvet1 - Ответ 1
 * @property string $otvet2 - Ответ 2
 * @property string $otvet3 - Ответ 3
 * @property string $otvet4 - Ответ 4
 * @property string $otvet5 - Ответ 5
 * @property string prav_otvet - Номер правильного варианта
 *
 * Class Test
 * @package App\Models
 */
class Question extends Model
{
    use HasFactory;

    /**
     * @var $table - Название таблицы
     */
    protected $table = 'kv_tests';

    protected $fillable = ['id_test', 'vopros', 'otvet1', 'otvet2', 'otvet3', 'otvet4', 'otvet5', 'prav_otvet'];

    public function test()
    {
        return $this->belongsTo(Test::class, 'id_test');
    }
}

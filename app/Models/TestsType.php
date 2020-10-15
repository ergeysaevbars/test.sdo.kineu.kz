<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Класс типа тестов
 *
 * @property integer $id
 * @property string $name - Название
 * @property integer $display_name - Название типа
 * @property integer $default_type
 * @property integer $self_test - Самопроверка
 * @property integer $quantity - Количество вопросов, отображаемое на экзамене
 * @property Carbon $time_test - Время тестирования
 * @property integer $payment - Оплата
 * @property integer $try - Количество попыток
 *
 * Class Test
 * @package App\Models
 */
class TestsType extends Model
{
    use HasFactory;

    /**
     * @var $table - Название таблицы
     */
    protected $table = 'kv_tests_type';

    protected $fillable = ['name_test', 'type_test'];
}

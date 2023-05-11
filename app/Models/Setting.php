<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property int $max_open_orders
 * @property int $interval_between_orders
 * @property int $max_orders_in_interval
 * @property string|null $telegram_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $telegram_template
 * @method static \Database\Factories\SettingFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereIntervalBetweenOrders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMaxOpenOrders($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereMaxOrdersInInterval($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTelegramTemplate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTelegramToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $api_url
 * @property string $rsi_url
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereApiUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereRsiUrl($value)
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'max_open_orders',
        'interval_between_orders',
        'max_orders_in_interval',
        'telegram_token',
        'telegram_template',
        'api_url',
        'rsi_url'
    ];
}

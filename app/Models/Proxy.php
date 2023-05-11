<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Proxy
 *
 * @property int $id
 * @property string $ip_address
 * @property string $username
 * @property string $password
 * @property int $port
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProxyFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy wherePort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proxy whereUsername($value)
 * @mixin \Eloquent
 */
class Proxy extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_address',
        'username',
        'password',
        'port',
        'status'
    ];
}

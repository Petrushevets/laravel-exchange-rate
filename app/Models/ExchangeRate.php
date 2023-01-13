<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ExchangeRate
 *
 * @property int $id
 * @property int $r030
 * @property string $txt
 * @property string $rate
 * @property string $cc
 * @property Carbon $exchangedate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ExchangeRate newModelQuery()
 * @method static Builder|ExchangeRate newQuery()
 * @method static Builder|ExchangeRate query()
 * @method static Builder|ExchangeRate whereCc($value)
 * @method static Builder|ExchangeRate whereCreatedAt($value)
 * @method static Builder|ExchangeRate whereExchangedate($value)
 * @method static Builder|ExchangeRate whereId($value)
 * @method static Builder|ExchangeRate whereR030($value)
 * @method static Builder|ExchangeRate whereRate($value)
 * @method static Builder|ExchangeRate whereTxt($value)
 * @method static Builder|ExchangeRate whereUpdatedAt($value)
 * @mixin Eloquent
 */
class ExchangeRate extends Model
{
    use HasFactory;

    protected $dates = ['exchangedate'];

    protected $guarded = [];

    protected function Exchangedate(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Carbon::createFromFormat('d.m.Y', $value),
        );
    }
}

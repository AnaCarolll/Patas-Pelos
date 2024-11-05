<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Database\Model\Relations\BelongsTo;
use Hyperf\DbConnection\Model\Model;


/**
 * @property int $id
 * @property string $nome
 * @property string $data_nascimento
 */
class Pet extends Model
{
    protected ?string $table = 'pets';
    protected array $fillable = [
        'nome',
        'data_nascimento',
    ];
    protected array $casts = [
        'id'=>'integer',
        'nome'=>'string',
        'data_nascimento'=>'date',
    ];
    protected array $hidden=[
        'created_at',
        'updated_at'
    ];

}

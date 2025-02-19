<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $nome
 */
class especie extends Model
{

    protected ?string $table = 'especie';

    protected array $fillable = [
        'nome',
        'descricao',
    ];

    protected array $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'descricao' => 'string',
    ];
}

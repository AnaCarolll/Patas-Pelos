<?php

declare(strict_types=1);

namespace App\Model;

use Hyperf\Database\Model\Relations\HasMany;
use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id
 * @property string $descricao
 * @property string $nome
 */
class Especie extends Model
{

    protected ?string $table = 'especie';

    protected array $fillable = [
        'nome',
        'descricao',
        'especie_id',
    ];

    protected array $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'descricao' => 'string',
    ];


    public function pets(): HasMany{
        return $this->hasMany(Pet::class, 'especie_id', 'id');
    }

}

<?php

namespace app\Models;

use PDO;

class Article extends AbstractModel {

    protected string $table = 'articles';

    protected array $columns = [
        'title',
        'content',
        'image',
        'created_at',
        'updated_at'
    ];
}

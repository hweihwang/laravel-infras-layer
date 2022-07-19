<?php

declare(strict_types=1);

namespace Support\Models;

use Illuminate\Database\Eloquent\Model;
use JeroenG\Explorer\Application\Explored;
use JeroenG\Explorer\Application\ManuallyIndexable;
use Laravel\Scout\Searchable;

abstract class AbstractSearchableEloquentModel extends Model implements Explored, ModelInterface, ManuallyIndexable
{
    use ManuallyIndexableTrait, Searchable {
        ManuallyIndexableTrait::getScoutKey insteadof Searchable;
    }
}

<?php

namespace Uccello\ModuleSkeleton\Models;

use Uccello\Core\Database\Eloquent\Model;

class ModuleSkeleton extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'module_skeletons';

    /**
     * Returns record label
     *
     * @return string
     */
    public function getRecordLabelAttribute() : string
    {
        return $this->name;
    }
}

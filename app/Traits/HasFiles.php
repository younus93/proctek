<?php

namespace App\Traits;

use App\Domains\Files\Models\File;

trait HasFiles
{
    public function files()
    {
        return $this->morphMany(File::class, 'fileable');
    }
}

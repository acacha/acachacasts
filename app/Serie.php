<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Serie.
 *
 * @package App
 */
class Serie extends Model
{
    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function episodes()
    {
        return $this->hasMany(Episode::class)->orderBy('name');
    }
}

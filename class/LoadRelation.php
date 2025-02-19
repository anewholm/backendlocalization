<?php

namespace Acorn\Backendlocalization\Class;

use Winter\Storm\Database\Builder;

/**
 * This algorithm changes the relationship from lazy to load relationship
 *
 * @use
 * on Class add
 *
 * use Acorn\Backendlocalization\Class\LoadRelation;
 *
 *  @author JaberRasul
 *  @package Acorn
 */

trait LoadRelation
{
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted(): void
    {
        $instance = new static;
        $belongsToRelaion = array_keys(array_filter($instance->belongsTo, function ($item) {
            if (isset($item['load'])) {
                return $item['load'] == true;
            } else {
                return false;
            }
        }));
        if (isset($belongsToRelaion) && !empty($belongsToRelaion)) {
            static::addGlobalScope('loadRelation', function (Builder $builder) use ($belongsToRelaion) {
                $builder->with($belongsToRelaion);
            });
        }
    }
}

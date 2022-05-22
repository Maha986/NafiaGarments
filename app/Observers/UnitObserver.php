<?php

namespace App\Observers;

use App\Models\Unit;

class UnitObserver
{
    /**
     * Handle the Unit "created" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function created(Unit $unit)
    {
        //
        alert()->success('Success', "Unit $unit->name Created");
    }

    /**
     * Handle the Unit "updated" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function updated(Unit $unit)
    {
        //
        alert()->success('Success', "Unit $unit->name Updated");
    }

    /**
     * Handle the Unit "deleted" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function deleted(Unit $unit)
    {
        //
        alert()->success('Success', "Unit $unit->name Deleted");
    }

    /**
     * Handle the Unit "restored" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function restored(Unit $unit)
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     *
     * @param  \App\Models\Unit  $unit
     * @return void
     */
    public function forceDeleted(Unit $unit)
    {
        //
    }
}

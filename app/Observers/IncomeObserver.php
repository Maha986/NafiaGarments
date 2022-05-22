<?php

namespace App\Observers;

use App\Models\Income;
use Illuminate\Support\Str;

class IncomeObserver
{
    public function creating(Income $income)
    {
        $income->guid = Str::uuid();
    }
    /**
     * Handle the Income "created" event.
     *
     * @param  \App\Models\Income  $income
     * @return void
     */
    public function created(Income $income)
    {
        //
        alert()->success('Success',"Income $income->name Created");
    }

    /**
     * Handle the Income "updated" event.
     *
     * @param  \App\Models\Income  $income
     * @return void
     */
    public function updated(Income $income)
    {
        //
        alert()->success('Success',"Income $income->name Updated");
    }

    /**
     * Handle the Income "deleted" event.
     *
     * @param  \App\Models\Income  $income
     * @return void
     */
    public function deleted(Income $income)
    {
        //
        alert()->success('Success',"Income $income->name Deleted");

    }

    /**
     * Handle the Income "restored" event.
     *
     * @param  \App\Models\Income  $income
     * @return void
     */
    public function restored(Income $income)
    {
        //
    }

    /**
     * Handle the Income "force deleted" event.
     *
     * @param  \App\Models\Income  $income
     * @return void
     */
    public function forceDeleted(Income $income)
    {
        //
    }
}

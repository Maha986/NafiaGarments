<?php

namespace App\Observers;

use App\Models\Expense;
use Illuminate\Support\Str;

class ExpenseObserver
{

    public function creating(Expense $expense)
    {
        $expense->guid = Str::uuid();
    }

    /**
     * Handle the Expense "created" event.
     *
     * @param \App\Models\Expense $expense
     * @return void
     */
    public function created(Expense $expense)
    {
        //
        alert()->success('Success', "Expense $expense->name Created");
    }

    /**
     * Handle the Expense "updated" event.
     *
     * @param \App\Models\Expense $expense
     * @return void
     */
    public function updated(Expense $expense)
    {
        //
        alert()->success('Success', "Expense $expense->name Updated");
    }

    /**
     * Handle the Expense "deleted" event.
     *
     * @param \App\Models\Expense $expense
     * @return void
     */
    public function deleted(Expense $expense)
    {
        //
        alert()->success('Success', "Expense $expense->name Deleted");
    }

    /**
     * Handle the Expense "restored" event.
     *
     * @param \App\Models\Expense $expense
     * @return void
     */
    public function restored(Expense $expense)
    {
        //
    }

    /**
     * Handle the Expense "force deleted" event.
     *
     * @param \App\Models\Expense $expense
     * @return void
     */
    public function forceDeleted(Expense $expense)
    {
        //
    }
}

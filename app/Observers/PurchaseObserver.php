<?php

namespace App\Observers;
use App\Models\Purchase;
use Illuminate\Support\Str;

class PurchaseObserver
{
    //
    public function creating(Purchase $purchase)
    {
//
        $purchase->code ="PR-" . Str::random(7);
    }

    /**
     * Handle the Asset "created" event.
     *
     * @param \App\Models\Sale $asset
     * @return void
     */
    public function created(Purchase $purchase)
    {
        //
        alert()->success('Success', "Purchase $purchase->code Created");
    }

    /**
     * Handle the Asset "updated" event.
     *
     * @param \App\Models\Purchase $purchase
     * @return void
     */
    public function updated(Purchase $purchase)
    {
        //
        alert()->success('Success', "Purchase $purchase->id Updated");
    }

    /**
     * Handle the Asset "deleted" event.
     *
     * @param \App\Models\Purchase $purchase
     * @return void
     */
    public function deleted(Purchase $purchase)
    {
        //
        alert()->success('Success', "Purchase $purchase->id Deleted");
    }

    /**
     * Handle the Asset "restored" event.
     *
     * @param \App\Models\Purchase $purchase
     * @return void
     */
    public function restored(Purchase $purchase)
    {
        //
    }

    /**
     * Handle the Asset "force deleted" event.
     *
     * @param \App\Models\Purchase $purchase
     * @return void
     */
    public function forceDeleted(Purchase $purchase)
    {
        //
    }
}

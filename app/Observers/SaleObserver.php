<?php

namespace App\Observers;

use App\Models\Sale;
use Illuminate\Support\Str;

class SaleObserver
{
    public function creating(Sale $sale)
    {
    }

    /**
     * Handle the Asset "created" event.
     *
     * @param \App\Models\Sale $asset
     * @return void
     */
    public function created(Sale $sale)
    {
        //
        alert()->success('Success', "Sale $sale->code Created");
    }

    /**
     * Handle the Asset "updated" event.
     *
     * @param \App\Models\Sale $sale
     * @return void
     */
    public function updated(Sale $sale)
    {
        //
        alert()->success('Success', "Sale $sale->id Updated");
    }

    /**
     * Handle the Asset "deleted" event.
     *
     * @param \App\Models\Sale $sale
     * @return void
     */
    public function deleted(Sale $sale)
    {
        //
        alert()->success('Success', "Sale $sale->id Deleted");
    }

    /**
     * Handle the Asset "restored" event.
     *
     * @param \App\Models\Sale $sale
     * @return void
     */
    public function restored(Sale $sale)
    {
        //
    }

    /**
     * Handle the Asset "force deleted" event.
     *
     * @param \App\Models\Sale $sale
     * @return void
     */
    public function forceDeleted(Sale $sale)
    {
        //
    }
}

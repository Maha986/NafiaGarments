<?php

namespace App\Observers;

use App\Models\Supplier;
use Illuminate\Support\Str;

class SupplierObserver
{
    /**
     * Handle the Supplier "creating" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function creating(Supplier $supplier)
    {
        $supplier->guid = Str::uuid();
    }

    /**
     * Handle the Supplier "created" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function created(Supplier $supplier)
    {
        //
        alert()->success('Success',"Supplier $supplier->name Created");
    }

    /**
     * Handle the Supplier "updated" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function updated(Supplier $supplier)
    {
        //
        alert()->success('Success',"Supplier $supplier->name Updated");
    }

    /**
     * Handle the Supplier "deleted" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function deleted(Supplier $supplier)
    {
        //
        alert()->success('Success',"Supplier $supplier->name Deleted");
    }

    /**
     * Handle the Supplier "restored" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function restored(Supplier $supplier)
    {
        //
    }

    /**
     * Handle the Supplier "force deleted" event.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return void
     */
    public function forceDeleted(Supplier $supplier)
    {
        //
    }
}

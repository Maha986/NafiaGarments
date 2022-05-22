<?php

namespace App\Observers;

use App\Models\Asset;
use Illuminate\Support\Str;
use Alert;

class AssetObserver
{


    public function creating(Asset $asset)
    {
        $asset->guid = Str::uuid();
    }

    /**
     * Handle the Asset "created" event.
     *
     * @param \App\Models\Asset $asset
     * @return void
     */
    public function created(Asset $asset)
    {
        //
        alert()->success('Success', "Asset $asset->name Created");
    }

    /**
     * Handle the Asset "updated" event.
     *
     * @param \App\Models\Asset $asset
     * @return void
     */
    public function updated(Asset $asset)
    {
        //
        alert()->success('Success', "Asset $asset->name Updated");
    }

    /**
     * Handle the Asset "deleted" event.
     *
     * @param \App\Models\Asset $asset
     * @return void
     */
    public function deleted(Asset $asset)
    {
        //
        alert()->success('Success', "Asset $asset->name Deleted");
    }

    /**
     * Handle the Asset "restored" event.
     *
     * @param \App\Models\Asset $asset
     * @return void
     */
    public function restored(Asset $asset)
    {
        //
    }

    /**
     * Handle the Asset "force deleted" event.
     *
     * @param \App\Models\Asset $asset
     * @return void
     */
    public function forceDeleted(Asset $asset)
    {
        //
    }
}

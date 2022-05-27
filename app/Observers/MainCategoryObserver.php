<?php

namespace App\Observers;

use App\Models\MainCategory;

class MainCategoryObserver
{
    /**
     * Handle the MainCategory "created" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function created(MainCategory $mainCategory)
    {
        //
        alert()->success('Success',"Category $mainCategory->name Created");
   }

    /**
     * Handle the MainCategory "updated" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function updated(MainCategory $mainCategory)
    {
        //
        alert()->success('Success',"Category $mainCategory->name Updated");
    }

    /**
     * Handle the MainCategory "deleted" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function deleted(MainCategory $mainCategory)
    {
        //
        alert()->success('Success',"Category $mainCategory->name Deleted");
    }

    /**
     * Handle the MainCategory "restored" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function restored(MainCategory $mainCategory)
    {
        //
    }

    /**
     * Handle the MainCategory "force deleted" event.
     *
     * @param  \App\Models\MainCategory  $mainCategory
     * @return void
     */
    public function forceDeleted(MainCategory $mainCategory)
    {
        //
    }
}

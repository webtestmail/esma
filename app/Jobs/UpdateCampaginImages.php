<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class UpdateCampaginImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $campaignId, public $productId, public $tmpPaths)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 1. PHYSICAL DELETE: Remove old images associated with this product first
        $oldImages = \App\Models\ProductImage::where('product_id', $this->productId)->get();
        
        foreach ($oldImages as $oldImage) {
            if (Storage::disk('public')->exists($oldImage->image)) {
                Storage::disk('public')->delete($oldImage->image);
            }
            $oldImage->delete(); // Remove record from DB
        }
    
        // 2. PROCESS NEW IMAGES: Move from tmp to samples
        foreach ($this->tmpPaths as $tmpPath) {
            $finalPath = str_replace('tmp/', 'samples/', $tmpPath);
            
            if (Storage::disk('public')->exists($tmpPath)) {
                Storage::disk('public')->move($tmpPath, $finalPath);
    
                \App\Models\ProductImage::create([
                    'product_id' => $this->productId,
                    'image'      => $finalPath,
                    'is_active'  => 1,
                ]);
            }
        }
    }
}

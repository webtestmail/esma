<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessCampaignImages implements ShouldQueue
{
   use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public function __construct(public $campaignId, public $productId, public $tmpPaths){
        
        
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        foreach ($this->tmpPaths as $tmpPath) {
            $finalPath = str_replace('tmp/', 'samples/', $tmpPath);
            
            // Move from tmp to final storage
            Storage::disk('public')->move($tmpPath, $finalPath);

            \App\Models\ProductImage::create([
                'product_id' => $this->productId,
                'image'      => $finalPath,
                'is_active'  => 1,
            ]);
        }
    }
}

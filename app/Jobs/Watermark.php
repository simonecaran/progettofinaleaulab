<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $announcement_image_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id = $announcement_image_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $i = Image::find($this->announcement_image_id);
        if(!$i){
            return;
        }
        $croppedImage = public_path($i->getUrl(300,400));
        $imageCrop = SpatieImage::load($croppedImage);
        $imageCrop->watermark(public_path('img/watermark/presto-watermark.png'))
        ->watermarkHeight(30,Manipulations::UNIT_PERCENT)
        ->watermarkWidth(30,Manipulations::UNIT_PERCENT)
        ->watermarkPosition(Manipulations::POSITION_TOP)
        ->save();
        $srcPath = storage_path('app/public/'. $i->path);
        $image = SpatieImage::load($srcPath);
        $image->watermark(public_path('img/watermark/presto-watermark.png'))
        ->watermarkHeight(30,Manipulations::UNIT_PERCENT)
        ->watermarkWidth(30,Manipulations::UNIT_PERCENT)
        ->watermarkPosition(Manipulations::POSITION_TOP)
        ->save();
    }
}

<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use App\Models\AnnouncementImage;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use GPBMetadata\Google\Cloud\Vision\V1\ImageAnnotator;
use Spatie\Image\Manipulations;

class GoogleVisionRemoveFaces implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    public function __construct($announcement_image_id)
    {
        $this->announcement_image_id=$announcement_image_id;
    }

    
    public function handle()
    {
        $i=AnnouncementImage::find($this->announcement_image_id);
        if (!$i) {
            return;
        }
        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);
        putenv('GOOGLE_APPLICATION_CREDENTIALS='.base_path('google_credential.json'));
        $imageAnnotator = new ImageAnnotatorClient();

        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();
            //echo "face\n";
            $bounds = [];
            foreach ($vertices as $vertex) {
            $bounds[] = [$vertex->getX(), $vertex->getY()];
            }
            $w = $bounds[2][0] - $bounds[0][0];
            $h = $bounds[2][1] - $bounds[0][1];
            $image = Image::load($srcPath);

            $image->watermark(base_path('resources/img/smile.png'))
            ->watermarkPosition('top-left')
            ->watermarkPadding($bounds[0][0], $bounds[0][1])
            ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
            ->watermarkHeight($h, Manipulations::UNIT_PIXELS)
            ->watermarkFit(Manipulations::FIT_STRETCH);
            $image->save($srcPath);
        }
        $imageAnnotator->close();
        }
}

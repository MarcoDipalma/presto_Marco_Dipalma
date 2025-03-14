<?php

namespace App\Jobs;

use App\Models\Image;
use Spatie\Image\Enums\Fit;
use Spatie\Image\Enums\AlignPosition;
use Spatie\Image\Image as SpatieImage;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Google\Cloud\Vision\V1\Client\ImageAnnotatorClient;

class RemoveFaces implements ShouldQueue
{
    // Trait App\Jobs\Dispatchable not found
    use Dispatchable, InteractsWhitQueue, Queueable, SerializesModels;

    private $article_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->article_image_id);
        if (!$i) {
            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);
        $image = file_get_contents($srcPath);

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();

        foreach ($faces as $face) {
            $vertices = $face->getBoundingPoly()->getVertices();

            $boundes = [];

            foreach ($vertices as $vertex) {
                $boundes[] = [$vertex->getX(), $vertex->getY()];
            }

            $w = $boundes[2][0] - $boundes[0][0];
            $h = $boundes[2][1] - $boundes[0][1];

            $image = SpatieImage::load($srcPath);

            $image->watermark(
                base_path('resources/img/sfocatura.jpg'),
                AlignPosition::TopLeft,
                paddingX: $boundes[0][0],
                paddingY: $boundes[0][1],
                width: $w,
                height: $h,
                fit: Fit::Stretch
            );

            $image->save($srcPath);

        }

        $imageAnnotator->close();

    }
}

<?php

namespace Classes;


class Image
{
    /* @var string ERROR_MESSAGE Error Message Text */
    const ERROR_MESSAGE = 'Processing error';

    /* @var int ERROR_HEIGHT Error Image Height */
    const ERROR_HEIGHT = 100;

    /* @var int ERROR_WIDTH Error Image Width */
    const ERROR_WIDTH = 200;

    /* @var string ERROR_BG Error Background Color in HTML */
    const ERROR_BG = 'FF0000';

    /* @var string ERROR_TEXT Error Text Color in HTML */
    const ERROR_TEXT = 'FFFFFF';

    /* @var resource $image Image to process */
    private $image;

    /* @var string $filename Image Original Name */
    private $filename;

    public function __construct(string $image)
    {
        if (!file_exists($image) or !is_readable($image)) {
            throw new \Exception('Unable to read image');
        }
        $handle = fopen($image, "r");
        if ($handle === false) {
            throw new \Exception('Unable to read image');
        }
        $contents = fread($handle, filesize($image));
        fclose($handle);

        $this->image = imagecreatefromstring($contents);

        $this->filename = pathinfo($image, PATHINFO_FILENAME);

        if ($this->image === false) {
            $this->error();
        }
    }

    public function resize(int $max_width, int $max_height)
    {
        $im_width = imagesx($this->image);
        $im_height = imagesy($this->image);

        $newDimensions = $this->getNewDimensions(
            $im_width,
            $im_height,
            $max_width,
            $max_height
        );

        $thumb = imagecreatetruecolor(
            $newDimensions['width'],
            $newDimensions['height']
        );

        imagecopyresampled(
            $thumb,
            $this->image,
            0,
            0,
            0,
            0,
            $newDimensions['width'],
            $newDimensions['height'],
            $im_width,
            $im_height
        );
        $filename = 'Resize/' . $this->filename . '_' . $newDimensions['width'] . 'x' . $newDimensions['height'] . '.png';

        imagepng(
            $thumb,
            $filename
        );
        imagedestroy($thumb);
        return $filename;
    }

    /**
     * Create Error Image
     */
    private function error()
    {
        $image = imagecreatetruecolor(self::ERROR_WIDTH, self::ERROR_HEIGHT);
        if ($image === false) {
            throw new \Exeption('Unable to initialize image');
        }
        $bg_col = $this->htmlToRGD(self::ERROR_BG);
        $bg_col = imagecolorallocate(
            $image,
            $bg_col['R'],
            $bg_col['G'],
            $bg_col['B']
        );
        imagefill($image, 0, 0, $bg_col);

        $text_color = $this->htmlToRGD(self::ERROR_TEXT);
        $text_color = imagecolorallocate(
            $image,
            $text_color['R'],
            $text_color['G'],
            $text_color['B']
        );

        imagestring($image, 10, 30, (self::ERROR_HEIGHT / 2) - 10,
            self::ERROR_MESSAGE, $text_color);
        imagepng(
            $image,
            'Resize/' . $this->filename . '_error.png'
        );
        imagedestroy($image);
    }

    /**
     * Convert HTML color into RGB array
     *
     * @param string $htmlColor
     * @return array
     */
    private function htmlToRGD(string $htmlColor)
    {
        if (!preg_match('/^[0-9A-F]{6}/', $htmlColor)) {
            throw new \Exeption('Bad HTML color format');
        }
        $rgb = [];
        $rgb['R'] = hexdec("0x" . substr($htmlColor, 0, 2));
        $rgb['G'] = hexdec("0x" . substr($htmlColor, 2, 2));
        $rgb['B'] = hexdec("0x" . substr($htmlColor, 4, 2));

        return $rgb;
    }

    /**
     * Calculate new image dimensions
     *
     * @param int $im_width
     * @param int $im_height
     * @param int $max_width
     * @param int $max_height
     * @return array
     */
    private function getNewDimensions(
        int $im_width,
        int $im_height,
        int $max_width,
        int $max_height
    ) {
        if ($im_width > $max_width || $im_height > $max_height) {
            if ($im_width > $im_height) {
                $newHeight = floor(($im_height / $im_width) * $max_width);
                $newWidth = $max_width;
            } else {
                $newWidth = floor(($im_width / $im_height) * $max_height);
                $newHeight = $max_height;
            }
        }

        return [
            'width' => $newWidth,
            'height' => $newHeight
        ];
    }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     */
    public function setFilename(string $filename): void
    {
        $this->filename = $filename;
    }
}
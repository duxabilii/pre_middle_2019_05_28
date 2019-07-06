<?php

namespace Tests;

use Classes\Image;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->image = new Image('Tests/testImage_300x210.jpg');
    }

    public function testResize()
    {
        foreach (
            [
                '300x210' => '100x70',
                '400x600' => '133x200', // Вероятная ошибка в ТЗ. Необходимо списать БОЛЬШУЮ сторону (600 / 200 = 3, 400 / 3 = 133)
                '400x800' => '100x200',
                '400x1000' => '80x200',
                '200x500' => '80x200'
            ] as $old => $new) {
            $this->image = new Image('Tests/testImage_' . $old . '.jpg');
            $img = imagecreatefromstring($this->image->resize(100, 200));
            $imageX = imagesx($img);
            $imageY = imagesy($img);
            $this->assertEquals(
                $imageX . 'x' . $imageY,
                $new
            );
        }
    }


}
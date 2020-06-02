<?php

namespace App\Core\Component\Craft\Domain;

final class Size
{
    private int $width;
    private int $length;
    private int $height;

    public function __construct(int $width, int $length, int $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function isEqual(Size $comparedSize): bool
    {
        return $this->width === $comparedSize->getWidth() && $this->length === $comparedSize->getLength() && $this->height === $comparedSize->getHeight();
    }
}

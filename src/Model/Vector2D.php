<?php

namespace PHPhysics\Model;

class Vector2D
{
    protected float $x;

    protected float $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX(): float
    {
        return $this->x;
    }

    public function setX(float $x): void
    {
        $this->x = $x;
    }

    public function getY(): float
    {
        return $this->y;
    }

    public function setY(float $y): void
    {
        $this->y = $y;
    }

    public function add(Vector2D $vector): void
    {
        $this->setX($this->getX() + $vector->getX());
        $this->setY($this->getY() + $vector->getY());
    }
}

<?php

namespace PHPhysics\Model;

class Body
{
    protected Vector2D $position;
    protected Vector2D $velocity;

    protected float $velocityX = 0; // metry na sekundę
    protected float $velocityY = 0;

    public function __construct(float $x, float $y)
    {
        $this->position = new Vector2D($x, $y);
        $this->velocity = new Vector2D(0, 0);
    }

    public function getPosition(): Vector2D
    {
        return $this->position;
    }

    public function setPosition(Vector2D $position): void
    {
        $this->position = $position;
    }

    public function getX(): float
    {
        return $this->position->getX();
    }

    public function getY(): float
    {
        return $this->position->getY();
    }

    public function getVelocity(): Vector2D
    {
        return $this->velocity;
    }

    public function setVelocity(Vector2D $velocity): void
    {
        $this->velocity = $velocity;
    }
}

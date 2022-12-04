<?php

namespace PHPhysics\Model;

class Simulation
{
    const G = -9.81;

    protected int $step = 0;

    /** @var Body[] */
    protected array $bodies;

    public function getStep(): int
    {
        return $this->step;
    }

    /**
     * Jeden pixel to 10cm.
     * Jeden krok to 100ms.
     */
    public function nextStep(): void
    {
        foreach($this->getBodies() as $body){
            $body->getPosition()->add($body->getVelocity());
            if($this->isPositionOccupied($body->getPosition())){
                $this->moveCollidingBody($body);
            }

            var_dump('Position: '.$body->getX().' '.$body->getY());

            $body->getVelocity()->add(new Vector2D(0, self::G/10));
        }
        $this->step = $this->step + 1;
    }

    private function isPositionOccupied(Vector2D $position): bool
    {
        foreach($this->getBodies() as $body){
            if(round($position->getX()) == round($body->getX()) && round($position->getY()) == round($body->getY())){
                return true;
            }
        }

        return false;
    }

    private function moveCollidingBody(Body $body): void
    {
        $possiblePositions = [
            clone $body->getPosition(),
            clone $body->getPosition(),
            clone $body->getPosition(),
            clone $body->getPosition(),
            clone $body->getPosition(),
        ];

        $possiblePositions[0]->add(new Vector2D(-1, 0)); // left
        $possiblePositions[1]->add(new Vector2D(1, 0)); // right
        $possiblePositions[2]->add(new Vector2D(-1, 1)); // top left
        $possiblePositions[3]->add(new Vector2D(1, 1)); // top right
        $possiblePositions[4]->add(new Vector2D(0, 1)); // top

        foreach($possiblePositions as $possiblePosition){
            if(!$this->isPositionOccupied($possiblePosition)){
                $body->setPosition($possiblePosition);
            }
        }

        // None of the preffered positions is free - just take a random one
        $body->getPosition()->add(new Vector2D(rand(-1, 1), rand(-1, 1)));
    }

    public function getBodies(): array
    {
        return $this->bodies;
    }

    public function addBody(Body $body): void
    {
        $this->bodies[] = $body;
    }
}

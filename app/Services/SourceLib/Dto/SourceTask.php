<?php

namespace App\Services\SourceLib\Dto;

//TODO: move to lib
class SourceTask
{
    private int $requestId;
    private string $source;
    private string|null $vin;
    private string|null $carNumber;

    public function __construct($requestId, $source, $carNumber, $vin)
    {
        $this
            ->setRequestId($requestId)
            ->setSource($source)
            ->setCarNumber($carNumber)
            ->setVin($vin);
    }

    public function getRequestId(): int
    {
        return $this->requestId;
    }

    public function setRequestId(int $requestId): self
    {
        $this->requestId = $requestId;

        return $this;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function setSource(string $source): self
    {
        $this->source = $source;

        return $this;
    }

    public function getVin(): string
    {
        return $this->vin;
    }

    public function setVin(string|null $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    public function getCarNumber(): string
    {
        return $this->carNumber;
    }

    public function setCarNumber(string|null $carNumber): self
    {
        $this->carNumber = $carNumber;

        return $this;
    }
}

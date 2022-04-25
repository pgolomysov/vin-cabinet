<?php

namespace App\Services\Sources;

use App\Models\Report;

class ReportComplete
{
    public function processJob(array $payload)
    {
        //TODO: add transformer
        /** @var \Vin\SourcesLib\Dto\ReportComplete $dto */
        $dto = $payload['payload'];

        $attributes = [
            'request_id' => $dto->getRequestId(),
            'source' => $dto->getSource(),
            'data' => json_encode($dto->getData()),
            'status' => 'completed',
        ];

        Report::create($attributes);
    }
}

<?php

namespace App\Services\Sources;

use App\Jobs\SourceTaskJob;
use App\Models\Request;
use App\Services\SourceLib\Dto\SourceTask;

class Sources
{
    private $sources = [
        'gibdd',
        'nomerogram'
    ];

    public function createAndPushToQueueAll(Request $model)
    {
        foreach ($this->sources as $source) {
            $payload = [
                'payload' => $this->buildPayloadDto($model, $source)
            ];

            SourceTaskJob::dispatch($payload)->onQueue('sources_task');
        }
    }

    private function buildPayloadDto(Request $model, $source)
    {
        return new SourceTask(
            $model->getAttribute('id'),
            $source,
            $model->getAttribute('car_number'),
            $model->getAttribute('vin'),
        );
    }
}

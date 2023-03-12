<?php

namespace App\Service;

use Symfony\Component\Serializer\Encoder\EncoderInterface;

class CsvResponseGenerator
{
    public function __construct(
        private EncoderInterface $encoder
    ) {
    }

    public function create(array $results): void
    {
        $csv = $this->encoder->encode($results, 'csv', ['csv_delimiter' => ';']);

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition', 'attachment');

        echo $csv;
        exit;
    }
}

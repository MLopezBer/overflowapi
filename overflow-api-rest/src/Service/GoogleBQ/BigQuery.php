<?php

namespace App\Service\GoogleBQ;

use Google\Cloud\BigQuery\BigQueryClient;

class BigQuery
{

    /**
     * @param string $query
     * @return array
     */
    public function sendQuery(string $query): array
    {
        putenv("GOOGLE_APPLICATION_CREDENTIALS=../googleapi.json");

        $bigQuery = new BigQueryClient();
        $result = [];

        $queryJobConfig = $bigQuery->query($query);
        $queryResults = $bigQuery->runQuery($queryJobConfig);

        foreach ($queryResults as $row) $result[] = $row;

        return $result;
    }
}
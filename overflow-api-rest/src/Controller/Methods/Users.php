<?php

namespace App\Controller\Methods;

use App\Service\GoogleBQ\BigQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/users')]
class Users extends AbstractController
{
    /**
     * @param string $name
     * @return JsonResponse
     */
    #[Route('/searchByName/{name}', name: 'post_text', methods: ['GET'])]
    public function searchByName(string $name): JsonResponse
    {
        $bq = new BigQuery();

        $sql = "SELECT * FROM bigquery-public-data.stackoverflow.users WHERE display_name LIKE '%".$name."%' LIMIT 5";
        $results = $bq->sendQuery($sql);

        return $this->json($results);
    }
}

<?php

namespace App\Controller\Methods;

use App\Service\GoogleBQ\BigQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/posts')]
class Posts extends AbstractController
{
    /**
     * @param string $text
     * @return JsonResponse
     */
    #[Route('/searchByText/{text}', name: 'post_text', methods: ['GET'])]
    public function searchByText(string $text): JsonResponse
    {
        $bq = new BigQuery();

        $sql = "SELECT * FROM bigquery-public-data.stackoverflow.stackoverflow_posts WHERE (title LIKE '%".$text."%' OR body LIKE '%".$text."%') LIMIT 5";
        $results = $bq->sendQuery($sql);

        return $this->json($results);
    }
}

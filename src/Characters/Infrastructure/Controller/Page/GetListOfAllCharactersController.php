<?php declare(strict_types=1);

namespace App\Characters\Infrastructure\Controller\Page;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GetListOfAllCharactersController
{
    public function index(): Response
    {
        return new JsonResponse();
    }
}

<?php

declare(strict_types=1);

namespace Support\Transportation\API\Concerns;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Support\DTOs\DTOInterface;
use Support\Filters\FilterInterface;
use Support\Services\ServiceInterface;
use Support\Transportation\API\FormRequests\FormRequestInterface;
use Support\Transportation\API\Paging\PagingInterface;
use Support\Transportation\API\Response\ErrorResponseInterface;
use Support\Transportation\API\Response\SuccessResponseInterface;

trait APIFoundationTrait
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function success(
        mixed $data,
        ?PagingInterface $paging = null,
        ?FilterInterface $filter = null
    ): JsonResponse {
        return app(SuccessResponseInterface::class)
            ->setData($data)
            ->setPaging($paging)
            ->setFilter($filter)
            ->response();
    }

    public function error(
        string $message,
        string $key,
        int $statusCode): JsonResponse
    {
        return app(ErrorResponseInterface::class)
            ->setMessage($message)
            ->setKey($key)
            ->setStatusCode($statusCode)
            ->response();
    }

    public function handle(
        FormRequestInterface $request,
        FilterInterface $filter,
        DTOInterface $dto,
        ServiceInterface $service,
        PagingInterface $paging
    ): JsonResponse {
        $data = $request->data($dto, $filter);

        return $this->success($service->execute($data), $paging, $filter);
    }
}

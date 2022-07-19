<?php

declare(strict_types=1);

namespace Support\Transportation\API\Response;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Support\Filters\FilterInterface;
use Support\Transportation\API\Paging\PagingInterface;

class SymphonyJsonSuccessResponse implements SuccessResponseInterface
{
    protected mixed $data;

    protected ?FilterInterface $filter = null;

    protected ?PagingInterface $paging = null;

    /**
     * @return mixed
     */
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * @param  mixed  $data
     * @return SymphonyJsonSuccessResponse
     */
    public function setData(mixed $data): SymphonyJsonSuccessResponse
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return FilterInterface|null
     */
    public function getFilter(): ?FilterInterface
    {
        return $this->filter;
    }

    /**
     * @param  FilterInterface|null  $filter
     * @return SymphonyJsonSuccessResponse
     */
    public function setFilter(?FilterInterface $filter): SymphonyJsonSuccessResponse
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return PagingInterface|null
     */
    public function getPaging(): ?PagingInterface
    {
        return $this->paging;
    }

    /**
     * @param  PagingInterface|null  $paging
     * @return SymphonyJsonSuccessResponse
     */
    public function setPaging(?PagingInterface $paging): SymphonyJsonSuccessResponse
    {
        $this->paging = $paging;

        return $this;
    }

    public function response(): JsonResponse
    {
        if ($this->data instanceof Paginator) {
            return self::fromPaginator($this->data, $this->paging, $this->filter);
        }

        if ($this->data instanceof ResourceCollection) {
            return self::fromResourceCollection($this->data, $this->paging, $this->filter);
        }

        return static::fromRaw($this->data);
    }

    public static function fromPaginator(
        Paginator $paginatedData,
        PagingInterface $paging,
        FilterInterface $filter
    ): JsonResponse {
        $response = [];

        $response['data'] = $paginatedData->items();

        if (! empty($paging)) {
            $response['paging'] = $paging->fromPaginator($paginatedData)->toArray();
        }

        if (! empty($filter)) {
            $response['filter'] = $filter->toArray();
        }

        return response()->json($response);
    }

    public static function fromResourceCollection(
        ResourceCollection $collection,
        PagingInterface $paging,
        FilterInterface $filter
    ): JsonResponse {
        return static::fromPaginator($collection->resource, $paging, $filter);
    }

    public static function fromRaw(mixed $data): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ]);
    }
}

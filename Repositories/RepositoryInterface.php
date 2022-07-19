<?php

declare(strict_types=1);

namespace Support\Repositories;

use Support\Filters\FilterInterface;
use Support\Models\ModelInterface;

interface RepositoryInterface
{
    /**
     * @param $id
     */
    public function getById($id);

    /**
     * @param  string[]  $columns
     * @param  string|null  $orderBy
     * @param  string  $direction
     */
    public function getAll(array $columns = ['*'], ?string $orderBy = 'id', string $direction = 'desc');

    /**
     * @param  int  $perPage
     * @param  int  $page
     * @param  string|null  $orderBy
     * @param  string  $direction
     * @param  string[]  $columns
     * @param  string  $pageName
     */
    public function getAllPaginated(
        int $perPage = 10,
        int $page = 1,
        ?string $orderBy = 'id',
        string $direction = 'desc',
        array $columns = ['*'],
        string $pageName = 'page'
    );

    /**
     * @param $search
     */
    public function search($search);

    /**
     * @param  FilterInterface  $filters
     * @param  string  $orderBy
     * @param  string  $direction
     * @param  string[]  $columns
     * @param  string  $search
     */
    public function filter(
        FilterInterface $filters,
        string $orderBy = 'id',
        string $direction = 'desc',
        array $columns = ['*'],
        string $search = ''
    );

    /**
     * @param  FilterInterface|null  $filters
     * @param  int  $perPage
     * @param  int  $page
     * @param  string  $orderBy
     * @param  string  $direction
     * @param  string[]  $columns
     * @param  string  $pageName
     * @param  string  $search
     */
    public function filterPaginated(
        ?FilterInterface $filters = null,
        int $perPage = 10,
        int $page = 1,
        string $orderBy = 'id',
        string $direction = 'desc',
        array $columns = ['*'],
        string $pageName = 'page',
        string $search = ''
    );

    /**
     * @param  ModelInterface  $model
     */
    public function setModel(ModelInterface $model);

    public function getModel();

    public function getModelClass();

    public function getModelShortClass();

    /**
     * @param  array  $attributes
     */
    public function add(array $attributes = []);

    /**
     * @param  array  $attributes
     */
    public function update(array $attributes = []);

    /**
     * @param $model
     */
    public function destroy($model);
//
//    /**
//     * @param Carbon|null $from
//     * @param Carbon|null $to
//     * @param string $ts
//     * @param string[] $columns
//     * @param null $orderBy
//     * @param string $direction
//     */
//    public function getDateBetween(
//        Carbon $from = null,
//        Carbon $to = null,
//        string $ts = 'created_at',
//        array  $columns = ['*'],
//               $orderBy = null,
//        string $direction = 'asc'
//    );
//
//    /**
//     * @param Carbon|null $from
//     * @param Carbon|null $to
//     * @param string $ts
//     * @param int $rows
//     * @param null $orderBy
//     * @param string $direction
//     * @param string[] $columns
//     * @param string $pageName
//     */
//    public function getDateBetweenPaginated(
//        Carbon $from = null,
//        Carbon $to = null,
//        string $ts = 'created_at',
//        int    $rows = 15,
//               $orderBy = null,
//        string $direction = 'asc',
//        array  $columns = ['*'],
//        string $pageName = 'page'
//    );
}

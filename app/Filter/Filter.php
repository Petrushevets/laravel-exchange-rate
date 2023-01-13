<?php

namespace App\Filter;

use Illuminate\Database\Eloquent\Builder;

class Filter
{
    private Builder $builder;

    private array $filters;

    /**
     * @param Builder $builder
     * @param array $filters
     */
    public function __construct(
        Builder $builder,
        array   $filters
    ) {
        $this->builder = $builder;
        $this->filters = $filters;
    }

    /**
     * Applies filter methods
     *
     * @return Builder
     */
    public function apply(): Builder
    {
        foreach ($this->filters as $filter => $value) {
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }

        return $this->builder;
    }

    /**
     * Sorts by DESC
     *
     * @param string $value
     * @return void
     */
    public function desc(string $value): void
    {
        $this->builder->orderBy($value, 'desc');
    }

    /**
     * Sorts by ASC
     *
     * @param string $value
     * @return void
     */
    public function asc(string $value): void
    {
        $this->builder->orderBy($value);
    }

    /**
     * Searching the fields
     *
     * @param array $values
     * @return void
     */
    public function search(array $values): void
    {
        foreach ($values as $key => $value) {
            $this->builder->where($key, 'LIKE', "%$value%")->get();
        }
    }
}

<?php

namespace Tests\Feature;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\ValidationHelperTrait;

abstract class EndpointTest extends TestCase
{
    use RefreshDatabase, ValidationHelperTrait;

    protected $base;

    protected $class;

    protected $table;

    /**
     * Create a new resource
     *
     * @return Model
     */
    protected function createResource()
    {
        return factory($this->class)->create();
    }

    /**
     * Create a resource and return the id
     *
     * @return int
     */
    protected function createAndGetResourceId()
    {
        return $this->createResource()->id;
    }

    /**
     * Create a resource and build the endpoint combining the base with the resource id
     *
     * @return string
     */
    protected function attachIdToBase()
    {
        return implode('/', [$this->base, $this->createAndGetResourceId()]);
    }

    /**
     * Find a resource by the id
     *
     * @param int $id
     * @return Model
     */
    protected function findResourceById($id)
    {
        return ($this->class)::find($id);
    }
}
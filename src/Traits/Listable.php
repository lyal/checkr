<?php

namespace Lyal\Checkr\Traits;

trait Listable
{
    protected $listPath;

    private $perPage = 25;
    private $currentPage = 1;
    private $count;
    private $list = [];

    private $hasNextPage;

    public function setListPath($path)
    {
        $this->listPath = $path;
    }

    public function getListPath()
    {
        return $this->listPath;
    }

    /**
     * Number of results to return per request.
     *
     * @return int
     */
    public function getPerPage() : int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     *
     * @return $this
     */
    public function setPerPage(int $perPage)
    {
        $this->perPage = $perPage;
        $this->setAttribute('per_page', $perPage);

        return $this;
    }

    /**
     * @param int $currentPage
     *
     * @return $this
     */
    public function setCurrentPage(int $currentPage)
    {
        $this->currentPage = $currentPage;
        $this->setAttribute('page', $currentPage);

        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage() : int
    {
        return $this->currentPage;
    }

    public function nextPage() : int
    {
        return ++$this->currentPage;
    }

    public function getCount() : int
    {
        return $this->count;
    }

    public function setCount($count) : int
    {
        return $this->count = $count;
    }

    public function setPagination($page = null, $perPage = null)
    {
        $this->setCurrentPage($page ?? $this->getCurrentPage());
        $this->setPerPage($perPage ?? $this->getPerPage());

        return $this;
    }

    public function hasNextPage() : bool
    {
        return $this->hasNextPage !== false;
    }

    public function setNextPage() : bool
    {
        return $this->hasNextPage = (($this->getPerPage() * $this->getCurrentPage()) < $this->getCount());
    }

    public function getList($page = null, $perPage = null)
    {
        $this->setPagination($page, $perPage);

        $path = $this->getListPath() ?? null;

        return $this->processList($this->getRequest($this->processPath($path)));
    }

    /**
     * @param \stdClass $items
     *
     * @return \Illuminate\Support\Collection|array
     */
    public function processList($items)
    {
        $list = [];

        $this->setCount($items->count);
        $this->setNextPage();

        foreach ((array) $items->data as $item) {
            $list[] = new $this($item, $this->getClient());
        }

        return $this->getClient()->useCollections ? collect($list) : $list;
    }

    public function all()
    {
        $list = collect([]);

        while ($this->hasNextPage()) {
            $list = $list->merge($this->getList());
            $this->nextPage();
        }

        return $this->getClient()->useCollections ? $list : $list->toArray();
    }
}

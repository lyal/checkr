<?php

namespace Tests\Unit;

use GuzzleHttp\Psr7\Response;
use Lyal\Checkr\Traits\Listable;
use Tests\UnitTestCase;

class ListableTest extends UnitTestCase
{
    private $listable;
    private $jsonString = '{"data": [
        {
            "id": "57ed4ce3057e0b002adc6d90",
            "object": "adverse_item",
            "text": "CHARGE: DELIVER COCAINE (STATUTE: 90-95(A)(1)) (DISPOSITION: DISMISSAL W/O LEAVE)"
        },
        {
            "id": "57ed4ce3057e0b002adc6d91",
            "object": "adverse_item",
            "text": "CHARGE: RESISTING PUBLIC OFFICER (STATUTE: 14-223) (DISPOSITION: DISMISSAL W/O LEAVE)"
         }
         ],
            "object": "list",
            "count": 2
         }';

    protected function setUp()
    {
        $this->listable = $this->getClient()->adverseItem();
    }

    public function testCheckListTrait()
    {
        $this->assertArrayHasKey(Listable::class, class_uses($this->listable));
    }

    public function testGetCurrentPage()
    {
        $page = $this->listable->getCurrentPage();
        $this->assertEquals('1', $page);
    }

    public function testSetPerPage()
    {
        $this->listable->setPerPage('100');
        $pageSize = $this->listable->getPerPage();
        $this->assertEquals('100', $pageSize);
    }

    public function testSetCurrentPage()
    {
        $this->listable->setCurrentPage(1);
        $page = $this->listable->getCurrentPage();
        $this->assertEquals('1', $page);
    }

    public function testNextPage()
    {
        $this->listable->setCurrentPage('1');
        $page = $this->listable->nextPage();
        $this->assertEquals(2, $page);
    }

    public function testCount()
    {
        $this->listable->setCount(1);
        $count = $this->listable->getCount();
        $this->assertEquals(1, $count);
    }

    public function testSetPagination()
    {
        $this->listable->setPagination(1, 1);
        $currentPage = $this->listable->getCurrentPage();
        $perPage = $this->listable->getPerPage();
        $this->assertEquals(1, $currentPage);
        $this->assertEquals(1, $perPage);
    }

    public function testHasNextPage()
    {
        $this->listable->setPagination(1, 1);
        $this->listable->setCount(100);
        $this->listable->setNextPage();
        $this->assertTrue($this->listable->hasNextPage());
    }

    public function testProcessList()
    {
        $payload = json_decode($this->jsonString);

        $collection = $this->listable->processList($payload);

        $this->assertEquals('57ed4ce3057e0b002adc6d90', $collection->first()->id);
    }

    public function testGetList($page = null, $perPage = null)
    {
        $responses = [new Response(200, [], $this->jsonString)];
        $adverseItems = $this->getClient($responses)->adverse_items()->getList();
        $this->assertEquals('Lyal\Checkr\Entities\Resources\AdverseItem', get_class($adverseItems->first()));
    }

    public function testAll()
    {
        $responses = [new Response(200, [], $this->jsonString), new Response(200, [], $this->jsonString)];
        $adverseItems = $this->getClient($responses)->adverse_items()->setPerPage(1)->all();
        $this->assertEquals('Lyal\Checkr\Entities\Resources\AdverseItem', get_class($adverseItems->first()));
    }
}

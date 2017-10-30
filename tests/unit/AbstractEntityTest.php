<?php


namespace Tests\Unit;


use GuzzleHttp\Psr7\Response;
use Lyal\Checkr\Entities\Resources\AdverseItem;
use Lyal\Checkr\Entities\Resources\Candidate;
use Lyal\Checkr\Entities\Resources\Document;
use Lyal\Checkr\Entities\Resources\Geo;
use Lyal\Checkr\Entities\Resources\Report;
use Lyal\Checkr\Exceptions\IdMissing;
use Lyal\Checkr\Exceptions\InvalidAttributeException;
use Lyal\Checkr\Exceptions\ResourceNotCreated;
use Tests\UnitTestCase;

class AbstractEntityTest extends UnitTestCase
{

    private $jsonAdverseItem = '{
      "id": "57ed4ce3057e0b002adc6d93",
      "object": "adverse_item",
      "text": "License status: Suspended"
    }';

    private $jsonReport = '{
    "id": "4722c07dd9a10c3985ae432a",
    "object": "report",
    "uri": "/v1/reports/4722c07dd9a10c3985ae432a",
    "status": "clear",
    "created_at": "2014-01-18T12:34:00Z",
    "completed_at": "2014-01-18T12:35:30Z",
    "revised_at": null,
    "turnaround_time": 90,
    "due_time": "2014-01-19T11:28:31Z",
    "adjudication": "engaged",
    "package": "driver_pro",
    "candidate_id": "e44aa283528e6fde7d542194",
    "ssn_trace_id": "539fd88c101897f7cd000001",
    "sex_offender_search_id": "539fd88c101897f7cd000008",
    "national_criminal_search_id": "539fd88c101897f7cd000006",
    "county_criminal_search_ids": [
      "539fdcf335644a0ef4000001",
      "532e71cfe88a1d4e8d00000c"
    ],
    "motor_vehicle_report_id": "539fd88c101897f7cd000007",
    "state_criminal_search_ids": [
      "539fdcf335644a0ef4000003",
      "532e71cfe88a1d4e8d000004"
    ],
    "document_ids": [],
    "geo_ids": [
      "87f5bb4983eade22c55f4731"
    ],
    "program_id": "00166f9ff39ec7b453adfaec"
  }';

    private $jsonGeo = '{
    "id": "87f5bb4983eade22c55f4731",
    "object": "geo",
    "uri": "/v1/geos/87f5bb4983eade22c55f4731",
    "created_at": "2015-01-18T12:34:00Z",
    "name": "San Francisco",
    "state": "CA",
    "deleted_at": null
  }
';

    private $jsonProgram = '  {
    "id": "00166f9ff39ec7b453adfaec",
    "object": "program",
    "name": "Program A",
    "created_at": "2017-08-07T16:51:09Z",
    "deleted_at": null,
    "geo_ids": [
      "cbc37748bc6a45b41af5c3f5"
    ],
    "package_ids": [
      "a57a0cd15965a585ff7d5d35"
    ]
  }';

    public function testInvalidMethod()
    {
        $this->expectException(InvalidAttributeException::class);
        $adverseItem = $this->getAdverseItem();
        $adverseItem->testBadValue = 1;
    }

    public function testPreviousObject()
    {
        $candidate = $this->getCandidate(['id' => 1]);
        $document = $this->getDocument();
        $document->setPreviousObject($candidate);
        $this->assertEquals(1, $document->candidate_id);
    }

    public function testCreateObject()
    {
        $responses = [
            new Response(201, [], $this->jsonReport),
        ];
        $report = $this->getReport([], $responses)->create();

        $this->assertEquals('4722c07dd9a10c3985ae432a', $report->id);
    }

    public function testFailedCreateObject()
    {
        $this->expectException(ResourceNotCreated::class);
        $responses = [
            new Response(200, [], $this->jsonReport),
        ];
        $report = $this->getReport([], $responses)->create();

    }

    public function testSaveObject()
    {
        $responses = [
            new Response(200, [], $this->jsonReport),
            new Response(200, [], $this->jsonReport),
        ];
        $report = $this->getReport([], $responses)->load();
        $report->save();
        $this->assertEquals('4722c07dd9a10c3985ae432a', $report->id);
    }

    public function testFailedSaveObject()
    {
        $this->expectException(IdMissing::class);
        $report = $this->getReport()->save();
    }


    public function testSetBadAttribute()
    {
        $this->expectException(InvalidAttributeException::class);
        $adverseItem = $this->getAdverseItem();
        $adverseItem->testBadValue = 1;
    }


    public function testGetBadAttribute()
    {
        $this->expectException(InvalidAttributeException::class);
        $adverseItem = $this->getAdverseItem();
        $p = $adverseItem->testBadValue;
    }

    public function testIsset()
    {
        $adverseItem = $this->getAdverseItem();
        $adverseItem->id = '1';
        $this->assertTrue(isset($adverseItem->id));

        $this->assertFalse(isset($adverseItem->object));

    }


    public function testClientMethod()
    {
        $report = $this->getReport()->adverseItem();
        $this->assertInstanceOf(get_class($this->getAdverseItem()), $report);
    }

    public function testDeleteMethod()
    {
        $responses = [
            new Response(200, [], $this->jsonGeo),
            new Response(200, [], $this->jsonGeo),
        ];
        $geo = $this->getGeo([], $responses)->load();
        $deleted = $geo->delete();
        $this->assertInstanceOf('Lyal\Checkr\Client', $deleted);
    }

    public function testEmbedMethod()
    {
        $report = $this->getReport();

        $fieldCheck = $report->checkField('include');

        $this->assertTrue($fieldCheck);

        $report->embed('county_criminal_searches');
        $this->assertEquals('county_criminal_searches', $report->getEmbeddedResources());

        $report->embed(['motor_vehicle_report', 'county_criminal_searches']);
        $this->assertEquals('motor_vehicle_report,county_criminal_searches', $report->getEmbeddedResources());
    }


    public function testIgnoreFieldChecks()
    {
        $geo = $this->getGeo();
        $geo->checkFields = false;
        $geo->id3 = 'hi';
        $this->assertEquals('hi', $geo->id3);
    }

    public function getGeo($values = [], array $response = [])
    {
        return new Geo($values, $this->getClient($response));
    }


    public function getAdverseItem($values = [], $responses = [])
    {
        return new AdverseItem($values, $this->getClient($responses));
    }

    public function getCandidate($values = [], $responses = [])
    {
        return new Candidate($values, $this->getClient($responses));
    }

    public function getDocument($values = [], $responses = [])
    {
        return new Document($values, $this->getClient($responses));

    }

    public function getReport($values = [], $responses = [])
    {
        return new Report($values, $this->getClient($responses));

    }
}
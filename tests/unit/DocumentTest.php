<?php
namespace Tests\Unit;

use GuzzleHttp\Psr7\Response;
use Lyal\Checkr\Entities\Resources\Document;
use Tests\UnitTestCase;

class DocumentTest extends UnitTestCase
{

    private $jsonString = '{
    "id": "4722c07dd9a10c3985ae432a",
    "object": "document",
    "created_at": "2015-02-11T20:01:50Z",
    "download_uri": "https://checkr-documents.checkr.com/download_path",
    "filesize": 8576,
    "filename": "1423684910_candidate_driver_license.jpg",
    "type": "driver_license",
    "content_type": "image/jpeg"
  }';

    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Document', $this->getDocument());
    }

    public function testSetId()
    {
        $document = $this->getDocument();
        $document->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $document->id);
    }

    public function testFields()
    {
        $values = [
            'id' => '4722c07dd9a10c3985ae432a',
            'object' => 'document',
            'created_at' => '2015-02-11T20:01:50Z',
            'download_uri' => 'https://checkr-documents.checkr.com/download_path',
            'filesize' => '8576',
            'filename' => '1423684910_candidate_driver_license.jpg',
            'type' => 'driver_license',
            'content_type' => 'image/jpeg',
        ];

        $document = $this->getDocument($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $document->{$key});
        }

    }

    public function testUpload()
    {
        $responses = [new Response(200, [], $this->jsonString)];
        $document = $this->getDocument(NULL, $responses);
        $response = $document->upload('drivers_license', __DIR__ . '/DocumentTest.php', '3333c07dd9a10c3985ae432a');

        $this->assertEquals('4722c07dd9a10c3985ae432a', $response->id);
    }

    protected function getDocument($values = NULL, $responses = [])
    {
        return new Document($values,$this->getClient($responses));
    }
}

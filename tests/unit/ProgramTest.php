<?php
namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Program;
use Tests\UnitTestCase;

class ProgramTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Program', $this->getProgram());
    }

    public function testSetId()
    {
        $program = $this->getProgram();
        $program->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194',$program->id);
    }

    public function testFields()
    {
        $values = [
            'id' => '00166f9ff39ec7b453adfaec',
            'object' => 'program',
            'name' => 'Program A',
            'created_at' => '2017-08-07T16:51:09Z',
            'deleted_at' => NULL,
            'geo_ids' =>
                [
                    'cbc37748bc6a45b41af5c3f5',
                ],
            'package_ids' =>
                [
                    'a57a0cd15965a585ff7d5d35',
                ]
        ];

        $program = $this->getProgram($values);

        foreach ($values as $key => $value) {
            if (is_array($value)) {
                $value = collect($value);
            }

            $this->assertEquals($value, $program->{$key});
        }

    }

    protected function getProgram($values = NULL)
    {
        return new Program($values,$this->getClient());
    }
}
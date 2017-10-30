<?php
namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Verification;
use Tests\UnitTestCase;

class VerificationTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Verification', $this->getVerification());
    }

    public function testSetId()
    {
        $verification = $this->getVerification();
        $verification->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $verification->id);
    }

    public function testFields()
    {
        $values = [
            'id' => 'db313e73383710d4fa2f18fd',
            'object' => 'verification',
            'uri' => 'https://api.checkr.com/v1/reports/4722c07dd9a10c3985ae432/verifications/db313e73383710d4fa2f18fd',
            'created_at' => '2014-01-18T12:34:00Z',
            'completed_at' => NULL,
            'verification_type' => 'id',
            'verification_url' => 'http://verifications.checkr.com/db313e73383710d4fa2f18fd',
        ];

        $verification = $this->getVerification($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $verification->{$key});
        }

    }

    protected function getVerification($values = NULL)
    {
        return new Verification($values,$this->getClient());
    }
}
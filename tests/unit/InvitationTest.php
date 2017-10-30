<?php

namespace Tests\Unit;

use Lyal\Checkr\Entities\Resources\Invitation;
use Tests\UnitTestCase;

/**
 * Created by PhpStorm.
 * User: lyal
 * Date: 10/23/17
 * Time: 4:58 PM.
 */
class InvitationTest extends UnitTestCase
{
    public function testInstantiation()
    {
        $this->assertInstanceOf('Lyal\Checkr\Entities\Resources\Invitation', $this->getInvitation());
    }

    public function testSetId()
    {
        $invitation = $this->getInvitation();
        $invitation->id = 'e44aa283528e6fde7d542194';
        $this->assertSame('e44aa283528e6fde7d542194', $invitation->id);
    }

    public function testFields()
    {
        $values = [
            'id'             => 'e44aa283528e6fde7d542194',
            'status'         => 'pending',
            'uri'            => '/v1/invitations/e44aa283528e6fde7d542194',
            'invitation_url' => 'https://www.checkr.com/invitation',
            'completed_at'   => null,
            'deleted_at'     => null,
            'expires_at'     => '2015-05-21T17:45:34Z',
            'package'        => 'package',
            'object'         => 'invitation',
            'created_at'     => '2015-05-14T17:45:34Z',
            'candidate_id'   => 'e44aa283528e6fde7d542194',
        ];

        $invitation = $this->getInvitation($values);

        foreach ($values as $key => $value) {
            $this->assertEquals($value, $invitation->{$key});
        }
    }

    protected function getInvitation($values = null)
    {
        return new Invitation($values, $this->getClient());
    }
}

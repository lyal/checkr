<?php

namespace Lyal\Checkr\Entities\Resources;

use Lyal\Checkr\Client;
use Lyal\Checkr\Traits\Creatable;
use Lyal\Checkr\Traits\Saveable;

class Report extends AbstractResource
{
    use Creatable, Saveable;

    /**
     * Report constructor.
     *
     * @param null|string|array $values
     * @param null|Client $client
     */
    public function __construct($values = null, Client $client = null)
    {
        $this->setFields([
            'id',
            'object',
            'uri',
            'status',
            'created_at',
            'completed_at',
            'upgraded_at',
            'revised_at',
            'tags',
            'turnaround_time',
            'assessment',
            'due_time',
            'adjudication',
            'package',
            'tags',
            'candidate_id',
            'program_id',
            'ssn_trace_id',
            'sex_offender_search_id',
            'federal_criminal_search_id',
            'national_criminal_search_id',
            'global_watchlist_search_id',
            'county_criminal_search_ids',
            'personal_reference_verification_ids',
            'professional_reference_verification_ids',
            'motor_vehicle_report_id',
            'state_criminal_search_ids',
            'terrorist_watchlist_search_id',
            'facis_search_id',
            'document_ids',
            'geo_ids',
            'tags',
            'arrest_search_id',
            'self_disclosure_ids'
        ]);
        parent::__construct($values, $client);
    }
}

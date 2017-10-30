<?php
namespace Lyal\Checkr\Entities\Resources;


class Document extends AbstractResource
{

    public function __construct($values = NULL, $client = NULL)
    {

        $this->setFields([
            'id',
            'object',
            'type',
            'created_at',
            'download_uri',
            'filesize',
            'filename',
            'content_type',
            'candidate_id'
        ]);

        $this->setHidden([
            'report_id',
            'hidden'
        ]);

        parent::__construct($values, $client);

    }


    /**
     * Upload a document using a multipart form
     *
     * @param $type
     * @param $file
     * @param null $candidateId
     * @return $this
     */
    public function upload($type, $file, $candidateId = NULL)
    {
        if ($candidateId) {
            $this->setAttribute('candidate_id', $candidateId);
        }

        $response = $this->uploadRequest($this->processPath('candidates/:candidate_id/documents',
            ['candidate_id' => $this->getAttribute('candidate_id')]),
            ['multipart' => [
                ['name' => 'type', 'contents' => $type],
                ['name' => 'file', 'contents' => fopen($file, 'rb')]
            ]
            ]);
        $this->setAttributes([]);
        $this->setValues($response);
        return $this;

    }

    protected function uploadRequest($path, $options)
    {
        return $this->getClient()->request('post', $path, $options);
    }

}
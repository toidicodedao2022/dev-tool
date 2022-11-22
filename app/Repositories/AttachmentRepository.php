<?php

namespace App\Repositories;

use App\Models\Attachment;
use MongoDB\BSON\ObjectId;

class AttachmentRepository extends BaseRepository
{
    public function __construct(Attachment $attachment)
    {
        parent::__construct($attachment);
    }

    /**
     * @param \MongoDB\BSON\ObjectId $objectId
     *
     * @return string
     */
    public function getUrlById(ObjectId $objectId): string
    {
        /** @var Attachment|null $attachment */
        $attachment = $this->findById($objectId->__toString());
        if (!$attachment instanceof Attachment) {
            return '';
        }

        return (string)config("filesystems.disks.{$attachment->disk}.url")."{$attachment->path}";
    }
}

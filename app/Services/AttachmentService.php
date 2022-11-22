<?php

namespace App\Services;

use App\Http\Responses\ApiResponse;
use App\Http\Responses\ResponseError;
use App\Http\Responses\ResponseSuccess;
use App\Repositories\AttachmentRepository;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class AttachmentService
{
    public function __construct(protected AttachmentRepository $attachmentRepository)
    {
    }

    /**
     * @param \Illuminate\Http\File|null $file
     *
     * @return \App\Http\Responses\ApiResponse|null
     */
    public function store(?UploadedFile $file): ?ApiResponse
    {
        if (!$file instanceof UploadedFile) {
            return new ResponseError();
        }
        $mimeType = $file->getMimeType();
        $ext = explode('/', $mimeType)[1];
        $date = date('Ymd');
        $disk = 's3';
        $path = $file->store("/{$date}", $disk);
        $dataCreate = [
            'path' => "/{$path}",
            'disk' => $disk,
            'bucket_name' => config("filesystems.disks.{$disk}.bucket"),
            'name' => $file->getClientOriginalName(),
            'use' => true
        ];
        /** @var \App\Models\Attachment $create */
        $create = $this->attachmentRepository->create($dataCreate);

        return new ResponseSuccess([
            'url' => config("filesystems.disks.{$disk}.url")."/{$path}",
            'attachment_oid' => $create->_id
        ]);
    }
}

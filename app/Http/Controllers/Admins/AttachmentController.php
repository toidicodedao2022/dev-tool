<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Services\AttachmentService;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function __construct(protected AttachmentService $attachmentService)
    {
    }

    public function store(Request $request)
    {
        $upload = $this->attachmentService->store($request->file('file'));
        return response()->json($upload->toArray());
    }
}

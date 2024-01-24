<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilesDataRequest;
use App\Services\GenerateFilesService;

class FilesController extends Controller
{
    public function __construct(
        private GenerateFilesService $generateFilesService
    ) {
    }

    public function getFileUrl(FilesDataRequest $request): string
    {
        $data = $request->validated();

        return $this->generateFilesService->getFileUrl($data);
    }
}

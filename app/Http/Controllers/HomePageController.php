<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ModulesService;
use Inertia\Inertia;
use Inertia\Response;

class HomePageController extends Controller
{
    public function __construct(
        private ModulesService $modulesService
    ) {
    }

    public function index(): Response
    {
        return Inertia::render('HomePage', [
            'modules' => $this->modulesService->getAll(),
        ]);
    }
}

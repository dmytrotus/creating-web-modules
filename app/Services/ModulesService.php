<?php

namespace App\Services;

use App\Models\Module;
use App\Http\Resources\ModuleResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ModulesService
{
    public function getAll(): AnonymousResourceCollection
    {
        return ModuleResource::collection(Module::orderByDesc('id')->get());
    }
}

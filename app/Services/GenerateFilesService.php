<?php

namespace App\Services;

use Illuminate\Foundation\Http\FormRequest;
use ZanySoft\Zip\Facades\Zip;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Module;
use Illuminate\Support\Facades\DB;
use App\Services\HtmlGeneratorService;
use App\Services\JsGeneratorService;
use App\Services\StylesGeneratorService;

class GenerateFilesService
{
    private array $data;
    private string $path;
    private HtmlGeneratorService $htmlGeneratorService;
    private JsGeneratorService $jsGeneratorService;
    private StylesGeneratorService $stylesGeneratorService;

    private function init(array $data): void
    {
        $this->data = $data;
        $this->htmlGeneratorService = new HtmlGeneratorService($data);
        $this->jsGeneratorService = new JsGeneratorService($data);
        $this->stylesGeneratorService = new StylesGeneratorService($data);
    }

    public function getFileUrl(array $data): string
    {
        $this->init($data);

        DB::transaction(function () {
            $this->createZipFile();
            $this->createRecordInDb();
        });

        return Storage::url($this->path);
    }

    private function createZipFile(): void
    {
        $directory = 'public/modules';
        $path = Storage::path($directory);

        if (!Storage::exists($directory)) {
            Storage::makeDirectory($directory);
        }

        $zipFilename = 'module_' . Str::random(5) . '.zip';

        $zip = Zip::create("$path/$zipFilename");
        $zip->addFromString('index.html', $this->htmlGeneratorService->getContent());
        $zip->addFromString('script.js', $this->jsGeneratorService->getContent());
        $zip->addFromString('style.css', $this->stylesGeneratorService->getContent());
        $zip->close();

        $this->path = "$directory/$zipFilename";
    }

    private function createRecordInDb(): void
    {
        Module::create([
            'path' => $this->path,
            'selected_module' => $this->data['selected_module']
        ]);
    }
}

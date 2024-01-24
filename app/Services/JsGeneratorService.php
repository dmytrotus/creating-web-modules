<?php

namespace App\Services;

class JsGeneratorService
{
    public function __construct(
        private array $data
    ) {
    }

    public function getContent()
    {
        $idSelector = $this->getIdSelector();
        $link = $this->getLink();

        return 'document.querySelector("' . $idSelector . '").addEventListener("click", () => {
            window.open("' . $link . '")
          })';
    }

    private function getIdSelector(): string
    {
        return match ($this->data['selected_module']) {
            'background' => '#background-module',
            'typo' => '#typo-module',
            default => 'No content',
        };
    }

    private function getLink(): string
    {
        return $this->data['clickout'] ?? 'No content';
    }
}

<?php

namespace App\Services;

class StylesGeneratorService
{
    public function __construct(
        private array $data
    ) {
    }

    public function getContent()
    {
        $stylesForModule = $this->getStylesForModule();

        return '.container {
            position: relative;
            width: 320px;
            height: 480px;
          
            border: solid #3E454B 2px;
          }
          
          ' . $this->getStylesForModule();
    }

    private function getModuleSelector(): string
    {
        return match ($this->data['selected_module']) {
            'background' => '#background-module',
            'typo' => '#background-module',
            default => '#no-content',
        };
    }

    private function getBackgroundColor(): string
    {
        return $this->data['background'] ?? '#FF9B00';
    }

    private function getStylesForModule(): string
    {
        return $this->getModuleSelector() . ' {
            position: absolute;
            top: ' . $this->data['position_y'] . '%;
            left: ' . $this->data['position_x'] . '%;
          
            width: ' . $this->data['width'] . '%;
            height: ' . $this->data['height'] . '%;
          
            background-color: ' . $this->getBackgroundColor() . ';
          
            cursor: pointer;
          }';
    }
}

<?php

namespace App\Services;

class HtmlGeneratorService
{
    public function __construct(
        private array $data
    ) {
    }

    public function getContent()
    {
        $title = $this->getTitle();
        $id = $this->getId();

        return '<!DOCTYPE html>
        <html lang="en">
           <head>
              <meta charset="UTF-8">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title>' . $title . '</title>
              <link rel="stylesheet" href="style.css">
              <script defer src="script.js"></script>
           </head>
           <body>
              <div class="container">
                 <div id="' . $id . '">
                 ' . $this->getText() . '
                 </div>
              </div>
           </body>
        </html>';
    }

    private function getTitle(): string
    {
        return match ($this->data['selected_module']) {
            'background' => 'Background module',
            'typo' => 'Typo module',
            default => 'No content',
        };
    }

    private function getId(): string
    {
        return match ($this->data['selected_module']) {
            'background' => 'background-module',
            'typo' => 'typo-module',
            default => 'no-content',
        };
    }

    private function getText(): string
    {
        return match ($this->data['selected_module']) {
            'typo' => '<span style="display: flex; text-align: center;">
            CLICK HERE AND YOU WILL ENTER THE PAGE
                </span>',
            default => ''
        };
    }
}

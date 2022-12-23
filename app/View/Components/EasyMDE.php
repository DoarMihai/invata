<?php

namespace App\View\Components;

class EasyMDE extends \BladeUIKit\Components\Editors\EasyMDE
{
    public function options(): array
    {
        return array_merge([
            'showIcons' => [
                'code',
                'strikethrough',
                'unordered-list',
                'ordered-list',
                'heading',
                'heading-bigger',
                'heading-smaller',
                'heading-1',
                'heading-2',
                'heading-3',
                'clean-block',
                'horizontal-rule'
            ]
        ], parent::options());
    }
}

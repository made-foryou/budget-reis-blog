<?php

namespace App\Nova\Flexible\Layouts;

use Manogi\Tiptap\Tiptap;
use Whitecube\NovaFlexibleContent\Layouts\Layout;

class Textual extends Layout implements ContentLayout
{
    /**
     * The layout's unique identifier
     *
     * @var string
     */
    protected $name = 'textual';

    /**
     * The displayed title
     *
     * @var string
     */
    protected $title = 'Tekstueel';

    /**
     * Get the fields displayed by the layout.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Tiptap::make('content')
                ->buttons([
                    'heading',
                    '|',
                    'italic',
                    'bold',
                    '|',
                    'link',
                    'code',
                    'strike',
                    'underline',
                    'highlight',
                    '|',
                    'bulletList',
                    'orderedList',
                    'br',
                    'codeBlock',
                    'blockquote',
                    '|',
                    'horizontalRule',
                    'hardBreak',
                    '|',
                    'table',
                    '|',
                    'image',
                    '|',
                    'textAlign',
                    '|',
                    'rtl',
                    '|',
                    'history',
                    '|',
                    'editHtml',
                ])
                ->headingLevels([2, 3, 4]),
        ];
    }

    public function getView(): string
    {
        return 'flexible.layouts.'. $this->name;
    }

    public function toArray(): array
    {
        return [
            'content' => $this->getAttribute('content'),
        ];
    }
}

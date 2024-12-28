<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Filament\Actions\Action;

class ButtonWidget extends Widget
{
    protected static string $view = 'filament.widgets.button-widget';

    public function callAction()
    {
        // Add your button action logic here
        // For example:
        // return redirect()->route('some.route');
    }

    protected function getViewData(): array
    {
        return [];
    }
}

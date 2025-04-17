<?php

namespace App\Livewire\Pages\Auth\Verification;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.auth')]
#[Title('Verify your email')]
class Notice extends Component
{
    public function render(): View
    {
        return view('livewire.pages.auth.verification.notice');
    }
}

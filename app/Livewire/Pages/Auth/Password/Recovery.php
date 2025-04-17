<?php

namespace App\Livewire\Pages\Auth\Password;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

#[Layout('components.layouts.auth')]
#[Title('Reset password')]
class Recovery extends Component
{
    #[Validate('required|email')]
    public string $email = '';

    public function render(): View
    {
        return view('livewire.pages.auth.password.recovery');
    }

    public function recovery(): bool | RedirectResponse | Redirector
    {
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        return $status === Password::ResetLinkSent
            ? back()->with('success', __($status))
            : back()->with('error', __($status));
    }
}

<?php

namespace App\Livewire\Pages\Auth\Password;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

#[Layout('components.layouts.auth')]
#[Title('Set new password')]
class Reset extends Component
{
    #[Validate('required')]
    public string $token;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required|confirmed')]
    public string $password = '';

    public string $password_confirmation = '';

    public function mount(): void
    {
        $this->token = request()->query('token');
        $this->email = request()->query('email');
    }

    public function render(): View
    {
        return view('livewire.pages.auth.password.reset');
    }

    public function resetPassword(): bool | RedirectResponse | Redirector
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function (User $user, string $password) {
                $user->forceFill(['password' => Hash::make($password)])
                    ->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', __($status))
            : back()->with('error', __($status));
    }
}

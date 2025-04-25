<?php

namespace App\Livewire\Pages\Auth;

use App\Interfaces\Services\UserServiceInterface;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportRedirects\Redirector;

#[Layout('components.layouts.auth')]
#[Title('Register')]
class Register extends Component
{
    #[Validate('required')]
    public string $name = '';

    #[Validate('required|email|unique:users,email')]
    public string $email = '';

    #[Validate('required|confirmed')]
    public string $password = '';

    public string $password_confirmation = '';

    public function render(): View
    {
        return view('livewire.pages.auth.register');
    }

    public function register(UserServiceInterface $userService): RedirectResponse | Redirector
    {
        $this->validate();

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ];

        $user = $userService->create($userData);

        // Event needed for email verification
        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->route('products.index')->with('success', 'User registered successfully!');
    }
}

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Mot de passe oublié ? Pas de problème. Indiquez-nous simplement votre adresse e-mail, et nous vous enverrons un lien de réinitialisation du mot de passe qui vous permettra de choisir a nouveau.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="bg-primary">
                {{ __('Lien de réinitialisation') }}
            </x-primary-button>
        </div>
    </form>
    <div class="col-md-12 text-black mt-3 mb-5">
            <form action="{{ route('home') }}" method="get">
                @csrf
                <x-primary-button class="ms-4 bg-primary">
                {{ __("Retour a l'acceuil") }}
            </x-primary-button>
            </form>
        </div>
</x-guest-layout>

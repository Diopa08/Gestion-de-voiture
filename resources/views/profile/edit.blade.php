<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl d-flex">
                    @include('profile.partials.delete-user-form')
                    
                </div>
                
            </div>
            <form action="{{ route('admin', Auth::user()->id) }}" method="get">
            @csrf
                      <button type="submit" class="bg-red-500 text-center hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                          Devenir Administrateur
                      </button>
            </form>
            @if(Auth::user()->is_admin)
            <form action="{{ route('not_admin', Auth::user()->id) }}" method="get">
            @csrf
                      <button type="submit" class="bg-red-500 text-center hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                          Quitter le mode admin 
                      </button>
            </form>
            @endif
        </div>
    </div>
</x-app-layout>

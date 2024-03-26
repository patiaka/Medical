<x-guest-layout>
    <h4 class="mb-2">Changement de Mot de Passe Requis 🔒</h4>
    <h6>
        NB: Utilisez au moins huit (8) caractères, mélangez majuscules, minuscules, chiffres et
        caractères spéciaux.
    </h6>
    @error('email')
<<<<<<< HEAD
        <div class="alert alert-danger d-flex" role="alert">
            <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                    class="bx bx-store fs-6"></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="alert-heading d-flex align-items-center mb-1">Error!!</h6>
                <span>{{ $message }}</span>
            </div>
        </div>
=======
    <div class="alert alert-danger d-flex" role="alert">
        <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                class="bx bx-store fs-6"></i></span>
        <div class="d-flex flex-column ps-1">
            <h6 class="alert-heading d-flex align-items-center mb-1">Error!!</h6>
            <span>{{ $message }}</span>
        </div>
    </div>
>>>>>>> f69b808e8a651970e0781f37e86b23f6282018e9
    @enderror

    <form method="POST" action="{{ route('change_password') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="email" value="{{ $email }}">

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

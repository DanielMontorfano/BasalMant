<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('img\imagenes\LogoIngenio2.png') }}" />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nombre') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <div>
                <x-jet-label for="username" value="{{ __('Usuario') }}" />
                <x-jet-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="area" value="{{ __('Área') }}" />
                <select id="area" name="area" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" wire:model="state.area">
                    <option value="" disabled selected>{{ __('Seleccione un área') }}</option>
                    <option value="Fábrica">{{ __('Fábrica') }}</option>
                    <option value="Calderas">{{ __('Calderas') }}</option>
                    <option value="Trapiche">{{ __('Trapiche') }}</option>
                    <option value="Eléctrica">{{ __('Eléctrica') }}</option>
                    <option value="Instrumentos">{{ __('Instrumentos') }}</option>
                    <option value="Mecánica">{{ __('Mecánica') }}</option>
                    <option value="Laboratorio">{{ __('Laboratorio') }}</option>
                    <option value="Calidad">{{ __('Calidad') }}</option>
                    <option value="Destilería">{{ __('Destilería') }}</option>
                    <option value="Serv. Generales">{{ __('Serv. Generales') }}</option>
                    <option value="Depósitos">{{ __('Depósitos') }}</option>
                    <option value="Salón de azúcar">{{ __('Salón de azúcar') }}</option>
                    <option value="Taller de herrería">{{ __('Taller de herrería') }}</option>
                    <option value="Of. técnica">{{ __('Of. técnica') }}</option>
                </select>
                <x-jet-input-error for="area" class="mt-2" />
            </div>
            

            

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya estás registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>

        </form>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="email" value="admin@gmail.com">
            <input type="hidden" name="password" value="12345678">
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Admin') }}
                </x-button>
            </div>
        </form>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="email" value="teacher@gmail.com">
            <input type="hidden" name="password" value="12345678">
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Teacher') }}
                </x-button>
            </div>
        </form>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="email" value="student1@gmail.com">
            <input type="hidden" name="password" value="12345678">
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Student1 Emon') }}
                </x-button>
            </div>
        </form>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="email" value="student2@gmail.com">
            <input type="hidden" name="password" value="12345678">
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Student2 Alem') }}
                </x-button>
            </div>
        </form>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="email" value="student3@gmail.com">
            <input type="hidden" name="password" value="12345678">
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Student3 Redwan') }}
                </x-button>
            </div>
        </form>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="hidden" name="email" value="student4@gmail.com">
            <input type="hidden" name="password" value="12345678">
            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Student4 Priyanka') }}
                </x-button>
            </div>
        </form>



    </x-authentication-card>

</x-guest-layout>

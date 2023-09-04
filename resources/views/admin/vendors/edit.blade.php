<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <h1 class="py-3 text-center">
                    Edit vendor
                </h1>
                <br>
                <form action="{{ route('vendors.update', $vendor->id) }}" method="post">

                    @csrf
                    @method('PUT')

                    @if(session()->has('success'))

                        <p style="padding: 10px; background-color: aquamarine">
                            {{session()->get('success')}}
                        </p>

                    @endif

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $vendor->name)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <br>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $vendor->email)" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      autocomplete="current-password" placeholder="*******************"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <br>

                    <x-primary-button class="ml-3">
                        Save
                    </x-primary-button>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>

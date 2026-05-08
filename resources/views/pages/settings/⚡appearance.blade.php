<?php

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

new #[Title('Appearance settings')] class extends Component {
    public string $theme = 'dark';

    public function mount(): void
    {
        $this->theme = Auth::user()?->theme ?? 'dark';
    }

    public function setTheme(string $theme): void
    {
        $theme = $theme === 'emerald' ? 'green' : $theme;

        abort_unless(in_array($theme, ['light', 'dark', 'green'], true), 422);

        $user = Auth::user();

        if (! $user) {
            return;
        }

        $user->forceFill(['theme' => $theme])->save();

        $this->theme = $theme;
    }
}; ?>

<section class="w-full">
    @include('partials.settings-heading')

    <flux:heading class="sr-only">{{ __('Appearance settings') }}</flux:heading>

    <x-pages::settings.layout :heading="__('Appearance')" :subheading="__('Update the appearance settings for your account')">
        <div x-data="{ theme: @entangle('theme') }" class="space-y-4">
            <flux:radio.group variant="segmented" x-model="theme" class="max-w-md">
                <flux:radio
                    value="light"
                    icon="sun"
                    x-on:click="theme = 'light'; window.SivoTheme.setTheme('light'); $wire.setTheme('light')"
                >
                    {{ __('Light') }}
                </flux:radio>
                <flux:radio
                    value="dark"
                    icon="moon"
                    x-on:click="theme = 'dark'; window.SivoTheme.setTheme('dark'); $wire.setTheme('dark')"
                >
                    {{ __('Dark') }}
                </flux:radio>
                <flux:radio
                    value="green"
                    icon="sparkles"
                    x-on:click="theme = 'green'; window.SivoTheme.setTheme('green'); $wire.setTheme('green')"
                >
                    {{ __('Green') }}
                </flux:radio>
            </flux:radio.group>

            <flux:text class="max-w-lg text-sm text-zinc-600 dark:text-zinc-400">
                {{ __('Choose a visual theme for the interface: bright light, classic dark, or a green accent palette on a clean white background.') }}
            </flux:text>
        </div>
    </x-pages::settings.layout>
</section>

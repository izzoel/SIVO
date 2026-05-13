<?php

use App\Models\KerusakanStatusChange;
use Illuminate\Support\Facades\Schema;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function statusChanges()
    {
        if (! Schema::hasTable('kerusakan_status_changes')) {
            return collect();
        }

        return KerusakanStatusChange::query()
            ->with([
                'kerusakan:id,id_persediaan,id_laboratorium,kondisi',
                'kerusakan.persediaan:id,nama',
                'kerusakan.laboratorium:id,nama',
                'statusLama:id,nama,warna',
                'statusBaru:id,nama,warna',
                'user:id,name',
            ])
            ->latest()
            ->limit(8)
            ->get();
    }

    #[On('notification-updated')]
    public function refreshNotification()
    {
        unset($this->statusChanges);
    }

    public function bersihkan()
    {
        if (Schema::hasTable('kerusakan_status_changes')) {
            KerusakanStatusChange::query()->delete();
        }

        unset($this->statusChanges);
    }
};
?>

<flux:dropdown position="top" align="end">
    <flux:button variant="ghost" square class="relative">
        <flux:icon name="bell" />

        @if ($this->statusChanges->isNotEmpty())
            <span class="absolute -end-1 -top-1 flex min-h-4 min-w-4 items-center justify-center rounded-full bg-red-600 px-1 text-[10px] font-medium leading-none text-white">
                {{ $this->statusChanges->count() }}
            </span>
        @endif
    </flux:button>

    <flux:menu class="w-80">
        <div class="px-2 py-1.5">
            <flux:heading size="sm">{{ __('Perubahan status kerusakan alat') }}</flux:heading>
            <flux:text class="mt-1 text-xs">{{ __('Aktivitas status terbaru') }}</flux:text>
        </div>

        <flux:menu.separator />

        @forelse ($this->statusChanges as $change)
            <flux:menu.item :href="route('laporan.kerusakan')" wire:navigate>
                <div class="grid gap-1 text-start">
                    <div class="font-medium">{{ $change->kerusakan?->persediaan?->nama ?? __('Alat tidak ditemukan') }}</div>

                    <div class="text-xs text-zinc-500 dark:text-zinc-400">
                        {{ $change->statusLama?->nama ?? __('Belum ada status') }}
                        <span aria-hidden="true">-></span>
                        {{ $change->statusBaru?->nama ?? __('Status baru') }}
                    </div>

                    <div class="text-xs text-zinc-400 dark:text-zinc-500">
                        {{ $change->user?->name ?? __('Sistem') }}
                        <span aria-hidden="true">-</span>
                        {{ $change->created_at?->diffForHumans() }}
                    </div>
                </div>
            </flux:menu.item>
        @empty
            <div class="px-2 py-3 text-sm text-zinc-500 dark:text-zinc-400">{{ __('Belum ada perubahan status kerusakan alat.') }}</div>
        @endforelse

        <flux:menu.separator />
        @if ($this->statusChanges->isNotEmpty())
            <flux:menu.item wire:click="bersihkan" class="cursor-pointer">
                <div class="flex w-full items-center justify-center">
                    <flux:icon.x-mark class="size-4 text-zinc-400 dark:text-zinc-300" />
                </div>
            </flux:menu.item>
        @endif
    </flux:menu>
</flux:dropdown>

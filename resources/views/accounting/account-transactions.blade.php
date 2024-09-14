<x-filament-panels::page>
    <x-filament-tables::container>
        <form wire:submit="loadReportData" class="p-6">
            {{ $this->form }}
        </form>

        <div class="text-center text-xl p-6">
            Current Balance: {{ $currentBalance | money }}
        </div>

        <x-filament-tables::table>
            <x-slot name="header">
                <x-filament-tables::header-cell>date</x-filament-tables::header-cell>
                <x-filament-tables::header-cell>description</x-filament-tables::header-cell>
                <x-filament-tables::header-cell>debit</x-filament-tables::header-cell>
                <x-filament-tables::header-cell>credit</x-filament-tables::header-cell>
                <x-filament-tables::header-cell class="!p-0">balance</x-filament-tables::header-cell>
            </x-slot>
            @foreach ($transactions as $transaction)
                <x-filament-tables::row class="p-2">
                    <x-filament-tables::cell>{{ $transaction->date }}</x-filament-tables::cell>
                    <x-filament-tables::cell>{{ $transaction->description }}</x-filament-tables::cell>
                    <x-filament-tables::cell>{{ $transaction->debit ?? '' | money }}</x-filament-tables::cell>
                    <x-filament-tables::cell>{{ $transaction->credit ?? '' | money }}</x-filament-tables::cell>
                    <x-filament-tables::cell>{{ $transaction->balance | money }}</x-filament-tables::cell>
                </x-filament-tables::row>
            @endforeach
        </x-filament-tables::table>
    </x-filament-tables::container>
</x-filament-panels::page>

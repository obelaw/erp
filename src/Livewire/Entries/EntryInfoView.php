<?php

namespace Obelaw\Accounting\Livewire\Entries;

use Livewire\Component;

class EntryInfoView extends Component
{
    public function mount($entry)
    {
        $this->entry = $entry;
    }

    public function render()
    {
        return view('obelaw-accounting::entries.views.entry', [
            'items' => $this->entry->amounts,
            'debitSum' => $this->entry->amounts()->where('type', 'debit')->sum('amount'),
            'creditSum' => $this->entry->amounts()->where('type', 'credit')->sum('amount'),
        ]);
    }
}

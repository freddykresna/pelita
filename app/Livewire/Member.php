<?php

namespace App\Livewire;

use App\Models\Member as ModelsMember;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Member extends Component
{
    use WithPagination;

    public string $sortBy = 'first_name';

    public string $sortDirection = 'asc';

    #[Computed]
    public function members()
    {
        return ModelsMember::whereIn('organization_id', Auth::user()->organizations->pluck('id'))
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.member');
    }

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }
}

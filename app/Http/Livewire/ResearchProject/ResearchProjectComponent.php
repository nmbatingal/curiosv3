<?php

namespace App\Http\Livewire\ResearchProject;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ResearchProject;

class ResearchProjectComponent extends Component
{
    use WithPagination;
    
    public $research_id;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.research-project.research-project-component', [
            'researchProjects' => ResearchProject::paginate(10),
        ]);
    }

}

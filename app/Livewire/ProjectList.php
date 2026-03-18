<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Project;

class ProjectList extends Component
{
    public $selectedProject = null;
    public $isOpen = false;

    // Méthode pour afficher les détails du projet
    public function showProject($projectId)
    {
        $this->selectedProject = Project::find($projectId);
        $this->isOpen = true;
    }

    // Méthode pour fermer le slide-over
    public function closeProject()
    {
        $this->isOpen = false;
        $this->selectedProject = null;
    }

    public function render()
    {
        return view('livewire.project-list', [
            'projects' => Project::orderBy('order', 'asc')->get(),
        ]);
    }
}
<?php

namespace App\Http\Livewire\Admin\Project;

use Livewire\Component;
use App\Models\Project;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $projectId;

    public function deleteProject($id)
    {
        $this->userId = $id;
    }

    public function destroyProject()
    {
        $project = Project::find($this->userId);
        $project->delete();

        session()->flash('message', 'Deleted successfully!');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function render()
    {
        $projects = Project::paginate(10);
        return view('livewire.admin.project.index', [
            'projects' => $projects
        ]);
    }
}

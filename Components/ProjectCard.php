<?php

namespace App\Components;

use Illuminate\View\Component;

class ProjectCard extends Component
{
    public $project;

    public function __construct($project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('components.project-card', [
            'project' => $this->project,
        ]);
    }
}

<?php

namespace App\Http\Livewire\ResearchProject;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ResearchProject;

class UserResearchComponent extends Component
{    
    use WithPagination;
    
    public $research_id;
    public $project_title, $keywords, $project_category, $description, $location, $budget, $more_contents, $funding_agency, $author, $created_by_id, $status_of_completion, $project_start, $project_end, $file_attachment_path;
    public $search = '';
    public $isOpen = 0;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.research-project.user-research-component', [
            'researchProjects' => ResearchProject::paginate(10),
        ]);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    private function resetInputFields(){
        $this->project_title ='';
        $this->keywords ='';
        $this->project_category ='';
        $this->description ='';
        $this->location ='';
        $this->budget ='';
        $this->more_contents ='';
        $this->funding_agency ='';
        $this->author ='';
        $this->created_by_id ='';
        $this->status_of_completion ='';
        $this->project_start ='';
        $this->project_end ='';
        $this->file_attachment_path ='';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'project_title' => 'required',
            'keywords' => 'required',
            'project_category' => 'required',
            'budget' => 'required',
            'funding_agency' => 'required',
            'author' => 'required',
            'status_of_completion' => 'required',
            'project_start' => 'required',
            'project_end' => 'required',
        ]);
    
        ResearchProject::updateOrCreate(['id' => $this->research_id], [
            'project_title' => $this->project_title,
            'keywords' => $this->keywords,
            'project_category' => $this->project_category,
            'budget' => $this->budget,
            'funding_agency' => $this->funding_agency,
            'author' => $this->author,
            'status_of_completion' => $this->status_of_completion,
            'project_start' => $this->project_start,
            'project_end' => $this->project_end,
        ]);
   
        session()->flash('message', 
            $this->research_id ? 'Project Updated Successfully.' : 'Project Created Successfully.');
   
        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function edit($id)
    {
        $Todo = ResearchProject::findOrFail($id);
        $this->research_id = $id;
        $this->project_title = $this->project_title;
        $this->keywords = $this->keywords;
        $this->project_category = $this->project_category;
        $this->budget = $this->budget;
        $this->funding_agency = $this->funding_agency;
        $this->author = $this->author;
        $this->status_of_completion = $this->status_of_completion;
        $this->project_start = $this->project_start;
        $this->project_end = $this->project_end;
     
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function delete($id)
    {
        ResearchProject::find($id)->delete();
        session()->flash('message', 'Project Deleted Successfully.');
    }
}

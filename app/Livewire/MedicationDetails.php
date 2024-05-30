<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medication;

class MedicationDetails extends Component
{
    public $medication;

    public function mount(Medication $medication)
    {
        $this->medication = $medication;
    }

    public function render()
    {
        return view('livewire.medication-details');
    }
}

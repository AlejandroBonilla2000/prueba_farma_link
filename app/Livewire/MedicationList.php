<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Medication;

class MedicationList extends Component
{
    public function render()
    {
        $medications = Medication::all();
        return view('livewire.medication-list', ['medications' => $medications]);
    }
}


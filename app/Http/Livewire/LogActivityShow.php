<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class LogActivityShow extends Component
{

    public function render()
    {
        $Activitys = Activity::all();
        return view('livewire.log-activity-show')->with(['Activitys' => $Activitys]);
    }

    public function delete($id)
    {
        $Activity = Activity::find($id);
        $Activity->delete();
    }
}

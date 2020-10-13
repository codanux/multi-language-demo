<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavigationDropdown extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-dropdown' => '$refresh',
    ];

    public $translations;

    public function mount($translations = [])
    {
        $this->translations = $translations;
    }


    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.navigation-dropdown');
    }
}

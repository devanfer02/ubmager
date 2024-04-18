<?php

namespace App\Livewire;

use Livewire\Component;

class UserOrders extends Component
{
    public $availableOrders;
    public $completedOrders;
    public $showAvailable = true;

    public function render()
    {
        return view('livewire.user-orders');
    }

    public function toggleView($type)
    {
        $this->showAvailable = $type === 'availableOrders';
    }
}

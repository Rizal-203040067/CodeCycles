<?php
 
namespace App\View\Components;
use Livewire\Component;
 
class Nocounter extends Component
{
    public $count = 1;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }
 
    public function render()
    {
        return view('layouts.nocounter');
    }
}
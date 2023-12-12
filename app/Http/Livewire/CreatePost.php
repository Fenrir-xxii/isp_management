<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreatePost extends Component
{
    // public function __construct(
    //     public string $type,
    //     public string $message,
    // ) {}
    public $title = 'Post title...';
    public function render()
    {
        return view('livewire.create-post');
    }
}

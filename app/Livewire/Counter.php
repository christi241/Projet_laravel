<?php

namespace App\Livewire;

use Livewire\Component;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Counter extends Component
{
    public $brigthness= 50;

    public function off(){

        $this->brigthness =0;
    }
    public function ON(){

        $this->brigthness =100;
    }
    public function render()
    {

        return view('livewire.counter');
    }
}

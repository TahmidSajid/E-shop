<?php

namespace App\Livewire\Variation;

use App\Models\Sizes;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Addsize extends Component
{

    #[Validate('required')]
    public $size = " ";

    public $prduct = " ";

    public function add_size(){
        $this->validate();
        Sizes::insert([
            'size' => $this->size,
            'product_id' => $this->prduct,
            'created_at'=> Carbon::now(),
        ]);
        $this->reset('size');
    }
    public function delete($id){
        Sizes::where('id',$id)->delete();
    }
    public function render()
    {
        $sizes = Sizes::where('product_id',$this->prduct)->get();
        return view('livewire.variation.addsize',compact('sizes'));
    }
}

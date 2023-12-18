<?php

namespace App\Livewire\Variation;

use Livewire\Component;
use App\Models\Colors;
use Livewire\Attributes\Validate;
use Carbon\Carbon;

class Color extends Component
{
    #[Validate('required')]
    public $code = " ";

    #[Validate('required')]
    public $name = " ";

    public $prduct = " ";

    public function add_color(){
        // $this->validate();
        Colors::insert([
            'color_code' => $this->code,
            'product_id' => $this->prduct,
            'created_at'=> Carbon::now(),
        ]);
        $this->reset('code','name');
    }
    public function delete($id){
        Colors::where('id',$id)->delete();
    }
    public function render()
    {
        $colors = Colors::where('product_id',$this->prduct)->get();
        return view('livewire.variation.color',compact('colors'));
    }
}

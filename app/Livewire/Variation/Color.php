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

    public $prduct = " ";

    public function add_color(){
        // $this->validate();
        Colors::insert([
            'color_code' => $this->code,
            'product_id' => $this->prduct,
            'created_at'=> Carbon::now(),
        ]);
        $this->reset('code');
    }
    public function delete($id){
        Colors::where('id',$id)->delete();
    }
    public function editColor($id){
        $old_values = Colors::where('id',$id)->first();
        $this->code = $old_values->color_code;
        $this->prduct = $old_values->product_id;
    }
    public function render()
    {
        $colors = Colors::where('product_id',$this->prduct)->get();
        return view('livewire.variation.color',compact('colors'));
    }
}

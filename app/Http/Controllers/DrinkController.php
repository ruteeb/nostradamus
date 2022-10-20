<?php


namespace App\Http\Controllers;

class DrinkController
{
    public $naam;

    public $kwaliteit;

    public $verkopenVoor;

    public function __construct($naam, $kwaliteit, $verkopenVoor)
    {
        $this->naam         = $naam;
        $this->kwaliteit    = $kwaliteit;
        $this->verkopenVoor = $verkopenVoor;
    }

    public static function of($naam, $kwaliteit, $verkopenVoor) {
        return new static($naam, $kwaliteit, $verkopenVoor);
    }

    public function tick()
    {
        if($this->naam === "Kloosterbier - Franziskaner"){

        }
        if ($this->naam !== 'Rode Wijn - Merlot' and $this->naam !== 'Witte Wijn - Chardonnay' and $this->naam !== "Kloosterbier - Franziskaner") {
            if ($this->kwaliteit > 0) {
                if ($this->naam !== 'BBQ - Afkoop drank') {
                    $this->kwaliteit--;
                }
            }
        }
        elseif($this->naam === "Kloosterbier - Franziskaner"){
            if ($this->kwaliteit > 0) {
                if($this->verkopenVoor > 0){
                    $this->kwaliteit= $this->kwaliteit-2;
                }else{
                    $this->kwaliteit= $this->kwaliteit-4;
                }
                if($this->verkopenVoor == 0){
                  // dd($this->kwaliteit);
                }
            }
        }
         else {



            if ($this->kwaliteit < 50) {
                $this->kwaliteit++;

                if ($this->naam === 'Witte Wijn - Chardonnay') {
                    if ($this->verkopenVoor < 11) {
                        if ($this->kwaliteit < 50) {
                            $this->kwaliteit++;
                        }
                    }
                    if ($this->verkopenVoor < 6) {
                        if ($this->kwaliteit < 50) {
                            $this->kwaliteit++;
                        }
                    }
                }
            }

        }

        if ($this->naam !== 'BBQ - Afkoop drank') {
            $this->verkopenVoor--;
        }

        if ($this->verkopenVoor < 0) {
            if ($this->naam !== 'Rode Wijn - Merlot') {
                if ($this->naam !== 'Witte Wijn - Chardonnay') {
                    if ($this->kwaliteit > 0) {
                        if ($this->naam !== 'BBQ - Afkoop drank' && $this->naam !== "Kloosterbier - Franziskaner") {
                            $this->kwaliteit--;
                        }
                    }
                } else {
                    $this->kwaliteit = 0;
                }
            } else {
                if ($this->kwaliteit < 50) {
                    $this->kwaliteit++;
                }
            }
        }
    }
}

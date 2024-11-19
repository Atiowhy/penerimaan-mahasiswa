<?php 
class Mobil{
    public $merk;
    public $warna;

    public function berjalan(){
        return "Mobil $this->merk sedang berjalan";
    }

    public function __construct($merk, $warna){
        $this->merk = $merk;
        $this->warna = $warna;
    }
}

$mobilSaya = new Mobil("Toyota", "Merah");
echo "Merk: " . $mobilSaya->merk . "<br>";
echo "Warna: " . $mobilSaya->warna . "<br>";
echo $mobilSaya->berjalan();
echo "<br>";

class Motor{
   public $warna;
   public $merk;
   public $jenis;

   public function maju(){
    return "Motor " . $this->merk . " " . $this->warna . " " . $this->jenis . " " . "sedang maju";
   }

   public function mundur(){
    return "Motor $this->merk sedang mundur";
   }

   public function kiri(){
    return "Motor $this->merk sedang belok kiri";
   }

   public function kanan(){
    return "Motor $this->merk sedang belok kanan";
   }

   public function __construct($warna, $merk, $jenis){
    $this->warna = $warna;
    $this->merk = $merk;
    $this->jenis = $jenis;
   }
}

$motorSaya = new Motor("merah", "honda", "matic");
echo "warna: " . $motorSaya->warna . "<br>";
echo "merk: " . $motorSaya->merk . "<br>";
echo "jenis: " . $motorSaya->jenis . "<br>";
echo $motorSaya->maju();
echo "<br>";
echo $motorSaya->mundur();
echo "<br>";
echo $motorSaya->kiri();
echo "<br>";
echo $motorSaya->kanan();


?>


<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\Produk as ModelProduk;
use Maatwebsite\Excel\Concerns\WithStartRow;

class Produk implements ToCollection, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $collect){
            $databasekode = ModelProduk::where('kode', $collect[1])->first();
            if(!$databasekode){
                $simpan = new ModelProduk();
                $simpan->kode = $collect[1];
                $simpan->nama = $collect[2];
                $simpan->harga = $collect[3];
                $simpan->stok = 3;
                $simpan->save();    
            }
        }
    }
}

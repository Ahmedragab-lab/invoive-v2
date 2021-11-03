<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends = ['tax','net'];

    public function section()
    {
        return $this->belongsTo(Section::class,'sections_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    // public function getTaxAttribute(){
    //     $tax= $this->net * $this->tax_rate /100;
    //     return number_format($tax,2);
    // }
    // public function getNetPriceAttribute(){
    //     $net= $this->net + $this->tax;
    //     return number_format($net,2);
    // }
   
}

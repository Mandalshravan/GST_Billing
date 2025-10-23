<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class GSTBillsModel extends Model{
    use HasFactory;

    protected $table = 'gst_bills';

       static public function getRecordAll($request){
    $return = self::select('gst_bills.*','parties_type.parties_type_name');
    $return = $return->join('parties_type', 'parties_type.id', '=', 'gst_bills.parties_type_id');
// search box start
     if(!empty(Request::get('id'))){
            $return = $return->where('gst_bills.id', '=',Request::get('id'));
        }
        if(!empty(Request::get('parties_type_name'))){
            $return = $return->where('parties_type.parties_type_name', 'like','%'.Request::get('parties_type_name').'%');
       
        }
         if(!empty(Request::get('invoice_date'))){
            $return = $return->whereDate('gst_bills.invoice_date', '=',Request::get('invoice_date'));

        }
         if(!empty(Request::get('invoice_no'))){
            $return = $return->where('gst_bills.invoice_no', 'like','%'.Request::get('invoice_no').'%');

        }
         if(!empty(Request::get('total_amount'))){
            $return = $return->where('gst_bills.total_amount', 'like','%'.Request::get('total_amount').'%');

        }
       
        //search box end

    $return = $return->paginate(10);
    return $return;
}

public function get_parties_type_name(){
    return $this->belongsTo(PartiesTypeModel::class, 'parties_type_id');
}

}
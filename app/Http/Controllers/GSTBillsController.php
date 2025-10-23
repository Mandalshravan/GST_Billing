<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PartiesTypeModel;
use  App\Models\GSTBillsModel;
use PDF;

class GSTBillsController extends Controller
{
    public function gst_bills(Request $request)
    {
        // $data['getRecord'] = GSTBillsModel::get();
        $data['getRecord'] = GSTBillsModel::getRecordAll($request);
        return view('admin.gst_bills.list', $data);

    }
    public function gst_bills_pdf_download($id){
        $data['getRecordRow'] = GSTBillsModel::find($id);
        $pdf = PDF::loadview('GSTPDFSingle',$data);
        return $pdf->download('GSTbillsRow.pdf');
    }

    public function gst_bills_download()
    {
        $getRecordAll = GSTBillsModel::select('gst_bills.*', 'parties_type.parties_type_name')
        ->join('parties_type', 'parties_type.id', '=', 'gst_bills.parties_type_id')
        ->get();
        $data = [
            'title' => 'Welcome to GST BILLS',
            'date' => date('m/d/Y'),
            'getRecord' => $getRecordAll
        ];
        $pdf = PDF::loadView('GSTPDF', $data);
       return $pdf->download('GSTBills.pdf');
    }

    public function gst_bills_add()
    {
        $data['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.gst_bills.add', $data);

    }

    public function gst_bills_insert(Request $request)
    {
        // dd($request->all());

       $save = new GSTBillsModel;
       $save->parties_type_id = trim($request->parties_type_id);
       $save->invoice_date = trim($request->invoice_date);
       $save->invoice_no = trim($request->invoice_no);
       $save->item_description = trim($request->item_description);
       $save->total_amount = trim($request->total_amount);
       $save->cgst_rate = trim($request->cgst_rate);
       $save->sgst_rate = trim($request->sgst_rate);
       $save->igst_rate = trim($request->igst_rate);
       $save->cgst_amount = trim($request->cgst_amount);
       $save->sgst_amount = trim($request->sgst_amount);
       $save->igst_amount = trim($request->igst_amount);
       $save->tax_amount = trim($request->tax_amount);
       $save->net_amount = trim($request->net_amount);
       $save->declaration = trim($request->declaration);
       $save->save();

       return redirect('admin/gst_bills')->with('success', 'GST Bill added successfully.');
   }


   public function gst_bills_edit($id)
    {
        //dd($id)

      // $data['getRecord'] = PartiesTypeModel::find($id); for simple ...
    //    $data['getRecord'] = GSTBillsModel::find($id);
    //    $data['getPartiesType'] = PartiesTypeModel::get();
     $data['getPartiesType'] = PartiesTypeModel::get();
        $data['getRecord'] = GSTBillsModel::find($id);
        return view('admin.gst_bills.edit', $data);
    }

    public function gst_bills_update($id, Request $request)
    {
       // dd($request->all());

        $save = GSTBillsModel::find($id);
        $save->parties_type_id = trim($request->parties_type_id);
        $save->invoice_date = trim($request->invoice_date);
        $save->invoice_no = trim($request->invoice_no);
        $save->item_description = trim($request->item_description);
        $save->total_amount = trim($request->total_amount);
        $save->cgst_rate = trim($request->cgst_rate);
        $save->sgst_rate = trim($request->sgst_rate);
        $save->igst_rate = trim($request->igst_rate);
        $save->cgst_amount = trim($request->cgst_amount);
        $save->sgst_amount = trim($request->sgst_amount);
        $save->igst_amount = trim($request->igst_amount);
        $save->tax_amount = trim($request->tax_amount);
        $save->net_amount = trim($request->net_amount);
        $save->declaration = trim($request->declaration);
        $save->save();

        return redirect('admin/gst_bills')->with('success','Record Successfully updated');
    }

    public function gst_bills_delete($id)
    {
        $delete = GSTBillsModel::find($id);
        $delete->delete();

        return redirect('admin/gst_bills')->with('success','Record Successfully deleted');
    }

    public function gst_bills_view($id)
    {
         $data['getRecord'] = GSTBillsModel::find($id);
        return view('admin.gst_bills.view', $data);

    }
}
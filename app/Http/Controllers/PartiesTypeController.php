<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PartiesTypeModel;
use App\Models\PartiesModel;
use PDF;

class PartiesTypeController extends Controller
{
    public function parties_type(Request $request)
    {
        $data['getRecord'] = PartiesTypeModel::getRecordAll($request);
        return view('admin.parties_type.list', $data);
       
    }

    public function parties_type_add()
    {
        return view('admin.parties_type.add');

    }

    public function parties_type_insert(Request $request)
    {
        // dd($request->all());

        $save = request()->validate([
            'parties_type_name' => 'required'
        ]);


        $save = new PartiesTypeModel;
        $save->parties_type_name = trim($request->parties_type_name);
        $save->save();

        return redirect('admin/parties_type')->with('success','Parties Type Added Successfully');
    }

   
    public function parties_type_edit($id, Request $request)
    {
        //dd($id)

      // $data['getRecord'] = PartiesTypeModel::find($id); for simple ...
       $data['getRecord'] = PartiesTypeModel::singleGetRecord($id);
        return view('admin.parties_type.edit', $data);
    }

    public function parties_type_update($id, Request $request)
    {
       // dd($request->all());

        $save = PartiesTypeModel::singleGetRecord($id);
        $save->parties_type_name = trim($request->parties_type_name);
        $save->save();

        return redirect('admin/parties_type')->with('success','Record Successfully updated');
    }

    public function parties_type_delete($id)
    {
        $delete = PartiesTypeModel::singleGetRecord($id);
        $delete->delete();

        return redirect('admin/parties_type')->with('success','Record Successfully deleted');
    }

    public function parties(Request $request)
    {
        $data['getRecord'] = PartiesModel::getRecordAll($request);
        return view('admin.parties.list', $data);

    }

    public function parties_pdf_download()
    {
    //    $getRecordAll = PartiesModel::get();
     $getRecordAll = PartiesModel::select('parties.*','parties_type.parties_type_name')
       ->join('parties_type','parties_type.id','=','parties.parties_type_id')
       ->get();
       $data = [
        'title' => 'PARTIES RECORD',
        'date'=> date('m/d/Y'),
        'parties' => $getRecordAll
       ];
         $pdf = PDF::loadView('PartiesPDF', $data);
         return $pdf->download('PartiesRecord.pdf');
    }

    public function parties_view($id)
    {
        //dd($id)

      // $data['getRecord'] = PartiesTypeModel::find($id); for simple ...
       $data['getRecord'] = PartiesModel::find($id);
    //  $data['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.parties.view', $data);
    }


    
    public function parties_type_pdf_generator(Request $request)
    {
       $getRecordAll = PartiesTypeModel::get();
       $data = [
        'title' => 'PARTIES TYPE RECORD',
        'date'=> date('m/d/Y'),
        'parties' => $getRecordAll
       ];
         $pdf = PDF::loadView('PartiesTypePDF', $data);
         return $pdf->download('PartiesTypeRecord.pdf');
    }


    public function parties_add()
    {
        $data['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.parties.add', $data);

    }

    public function parties_insert(Request $request)
    {
    //    dd($request->all());
       $save = new PartiesModel;
       $save->parties_type_id = trim($request->parties_type_id);
       $save->full_name = trim($request->full_name);
       $save->phone_no = trim($request->phone_no);
       $save->address = trim($request->address);
       $save->account_holder_name = trim($request->account_holder_name);
       $save->account_no = trim($request->account_no);
       $save->bank_name = trim($request->bank_name);
       $save->ifsc_code = trim($request->ifsc_code);
       $save->branch_address = trim($request->branch_address);
       $save->save();
       return redirect('admin/parties')->with('success','Record Successfully created');

    }

    public function parties_edit($id, Request $request)
    {
        //dd($id)
         $data['getRecord'] = PartiesModel::singleGetRecord($id); // for simple ...
        $data['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.parties.edit', $data);
    }

    public function parties_update($id, Request $request)
    {
       // dd($request->all());

        $save = PartiesModel::singleGetRecord($id);
        $save->parties_type_id = trim($request->parties_type_id);
        $save->full_name = trim($request->full_name);
        $save->phone_no = trim($request->phone_no);
        $save->address = trim($request->address);
        $save->account_holder_name = trim($request->account_holder_name);
        $save->account_no = trim($request->account_no);
        $save->bank_name = trim($request->bank_name);
        $save->ifsc_code = trim($request->ifsc_code);
        $save->branch_address = trim($request->branch_address);
        $save->save();

        return redirect('admin/parties')->with('success','Record Successfully updated');
    }

    public function parties_delete($id, Request $request)
    {
        $delete = PartiesModel::singleGetRecord($id);
        $delete->delete();

        return redirect('admin/parties')->with('success','Record Successfully deleted');
    }

}







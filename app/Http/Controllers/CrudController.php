<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    //
    public function showData()
    {
        //$showData= Crud::all();
        //$showData= Crud::paginate(5);
        $showData= Crud::simplePaginate(5);
        return view('show_data', compact('showData'));
    }

    public function addData()
    {
        return view('add_data');
    }

    public function storeData(Request $request)
    {
        //any variable name can be used at the place of rules;
        $rules = [
            'name'=>'required|max:10',
            'email'=>'required|email'
        ];

        //use it to show validation message bellow, not the defaults::
        $mes = [
            'name.required'=>'Enter Your Name',
            'name.max'=>'Your name can not contain more than 10 character',
            'email.required'=>'Enter Your Email',
            'email.email'=>'Email must be a valid email'
        ];

        $this->validate($request, $rules, $mes);

        $crud= new Crud();
        // $crud->db_table_field_name= $request->form_input_name
        $crud->name= $request->name;
        $crud->email= $request->email;
        $crud->save();
        Session::flash('msg', 'Data has added successfully');

        return redirect('/');
    }

    public function editData($id=null)
    {
        $editData = Crud::find($id);
        return view('edit_data', compact('editData'));
    }

    public function updateData(Request $request, $id)
    {
        //any variable name can be used at the place of rules;
        $rules = [
            'name'=>'required|max:10',
            'email'=>'required|email'
        ];

        //use it to show validation message bellow, not the defaults::
        $mes = [
            'name.required'=>'Enter Your Name',
            'name.max'=>'Your name can not contain more than 10 character',
            'email.required'=>'Enter Your Email',
            'email.email'=>'Email must be a valid email'
        ];

        $this->validate($request, $rules, $mes);

        $crud= Crud::find($id);
        // $crud->db_table_field_name= $request->form_input_name
        $crud->name= $request->name;
        $crud->email= $request->email;
        $crud->save();
        Session::flash('msg', 'Data has updated successfully');

        return redirect('/');
    }

    public function deleteData($id)
    {
        $deleteData = Crud::find($id);
        $deleteData->delete();
        Session::flash('msg', 'Data successfully deleted');
        return redirect('/');
    }
}

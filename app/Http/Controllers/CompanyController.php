<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       $companies = Company::paginate(8);
       $menu = 'company';
        return view('company.index', compact(['companies','menu']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        Company::create($request->all());
        return redirect()->action('CompanyController@index');
    }

    public function show(Request $request)
    {
        $searchs = DB::table('companies')->where('name','like',"%". $request->name . "%")->get();
        $menu = 'company';
        return view('company.index', compact(['searchs','menu']));
    }


    public function edit($id)
    {
       $company = Company::find($id);
       return $company;
    }


    public function update(Request $request)
    {

        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->phone = $request->phone;
        $company->cnpj = $request->cnpj;
        $company->address = $request->address;
        $company->save();
        return redirect()->action('CompanyController@index');
    }


    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->action('CompanyController@index');
    }

    public function all(Request $request)
    {

        $companies = DB::table('companies')->select('name')->where('name', 'like', '%'.$request->term.'%')->get();
        $result = '[ ';
        $fim = false;
        foreach ($companies as $company){
            if($fim){
                $result .= ', ';
            } else{
                $fim = true;
            }
            $result .= json_encode($company->name);
        }
        $result .= ' ]';
        return $result;
    }

    public function getCompanyId(Request $request)
    {
        $company = DB::table('companies')->select('id')->where('name', 'like', '%'.$request->name.'%')->get();

        return $company;
    }
}

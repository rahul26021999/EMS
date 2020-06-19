<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeDocuments;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employes=Employee::withCount("EmployeeDocuments")->get();
        return view('employee.index',['employes'=>$employes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee=Employee::create([
            'first_name'=>$request->input('firstName'),
            'last_name'=>$request->input('lastName',null),
            'dob'=>$request->input('dob',null),
            'phone_number'=>$request->input('phoneNumber',null)
        ])->fresh();

        if (isset($request['files'])) {

            $paths=$this->upload($request);
            foreach ($paths as $key => $value) {
                EmployeeDocuments::create([
                    'file'=>$value,
                    'employee_id'=>$employee->id,
                ]);
            }
        }

        return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $documents=$employee->EmployeeDocuments;
        return view('employee.show',['employee'=>$employee,'documents'=>$documents]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',['employee'=>$employee]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->first_name=$request->input('firstName');
        $employee->last_name=$request->input('lastName');
        $employee->dob=$request->input('dob');
        $employee->phone_number=$request->input('phoneNumber');
        $employee->save();

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employes->delete();
        return redirect()->route('employee.index');
    }

    public function upload(Request $request)
    {
        $paths = [];
        $files = $request->file('files');

        foreach ($files as $postion=>$file)
        {
            // Generate a file name with extension
            $fileName = time().'_'.$postion.'.'.$file->getClientOriginalExtension();
            // Save the file
            $paths[] = $file->storeAs('files', $fileName);
        }

        return $paths;
    }

    public function search(Request $request)
    {
        $employes=Employee::withCount('EmployeeDocuments')
                    ->where('first_name', 'like', $request['first_name'] . '%')
                    ->where('last_name', 'like',  $request['last_name'] . '%')
                    ->where('phone_number', 'like',  $request['phone_number'] . '%')
                    ->get();

        return view('employee.index',['employes'=>$employes,'first_name'=>$request['first_name'],'last_name'=>$request['last_name'],'phone_number'=>$request['phone_number']]);

    }
}

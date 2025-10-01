<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse // Tambahkan tipe return RedirectResponse
    {
        // 1. Validasi Input (WAJIB)
        $request->validate([
            'nama_lengkap' => 'required|max:100',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,nonaktif', // Wajib ada untuk select option
        ]);
    Employee::create($request->all());
    return redirect()->route('employees.index')
                         ->with('success', 'Data Karyawan berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Employee $employee) // Menggunakan Route Model Binding
    {
        return view('employees.show', compact('employee'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $employee = Employee::find($id);
    return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'nomor_telepon' => 'required|string|max:20',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'status' => 'required|string|max:50',
    ]);
    
    $employee = Employee::findOrFail($id);
    $employee->update($request->only([
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
    ]));
    
    return redirect()->route('employees.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
    $employee->delete();
    return redirect()->route('employees.index');
    }
}

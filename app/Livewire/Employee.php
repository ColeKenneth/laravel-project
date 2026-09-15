<?php

namespace App\Livewire;

use App\Models\Employee as EmployeeModel;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
#[Title('Employee')]
class Employee extends Component
{
    use WithPagination;

    public string $employeeNumber = '';
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $phoneNumber = '';
    public string $position = '';
    public string $hiredAt = '';
    public bool $showSuccessModal = false;
    public ?int $editingEmployeeId = null;
    public ?int $deletingEmployeeId = null;
    public bool $showDeleteModal = false;

    public function save() : void
    {
        $this->validate([
            'employeeNumber' => 'required|string|max:50|unique:employees,employee_number',
            'firstName' => 'required|string|max:100',
            'lastName' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:employees,email',
            'phoneNumber' => 'required|string|max:20',
            'position' => 'required|string|max:50',
            'hiredAt' => 'required|date|before_or_equal:today'
        ]);

        EmployeeModel::create([
            'employee_number' => $this->employeeNumber,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'position' => $this->position,
            'hired_at' => $this->hiredAt
        ]);

        $this->reset();

        $this->showSuccessModal = true;
    }

    public function edit(int $id) : void
    {
        $employee = EmployeeModel::findOrFail($id);

        $this->editingEmployeeId = $employee->id;
        $this->employeeNumber = $employee->employee_number;
        $this->firstName = $employee->first_name;
        $this->lastName = $employee->last_name;
        $this->email = $employee->email;
        $this->phoneNumber = $employee->phone_number;
        $this->position = $employee->position;
        $this->hiredAt = $employee->hired_at->format('Y-m-d');
    }

    public function update() : void
    {
        $this->validate([
            'employeeNumber' => 'required|string|max:50|unique:employees,employee_number,' . $this->editingEmployeeId,
            'firstName' => 'required|string|max:100',
            'lastName' => 'required|string|max:100',
            'email' => 'required|email|max:255|unique:employees,email,' . $this->editingEmployeeId,
            'phoneNumber' => 'required|string|max:20',
            'position' => 'required|string|max:50',
            'hiredAt' => 'required|date|before_or_equal:today'
        ]);

        $employee = EmployeeModel::findOrFail($this->editingEmployeeId);

        $employee->update([
            'employee_number' => $this->employeeNumber,
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'position' => $this->position,
            'hired_at' => $this->hiredAt,
        ]);

        $this->reset();

        $this->showSuccessModal = true;
    }

    public function cancelEdit() : void
    {
        $this->reset([
            'employeeNumber',
            'firstName',
            'lastName',
            'email',
            'phoneNumber',
            'position',
            'hiredAt',
            'editingEmployeeId',
        ]);
    }

    public function confirmDelete(int $id) : void
    {
        $this->deletingEmployeeId = $id;
        $this->showDeleteModal = true;
    }

    public function delete() : void
    {
        EmployeeModel::findOrFail($this->deletingEmployeeId)->delete();

        $this->deletingEmployeeId = null;
        $this->showDeleteModal = false;
    }

    public function closeDeleteModal() : void
    {
        $this->deletingEmployeeId = null;
        $this->showDeleteModal = false;
    }

    public function closeSuccessModal() : void
    {
        $this->showSuccessModal = false;
    }

    public function render() : View
    {
        return view('livewire.employee', [
            'employees' => EmployeeModel::latest()->paginate(5),
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\Employee as EmployeeModel;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')]
#[Title('Employee')]
class Employee extends Component
{
    public string $employeeNumber = '';
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $phoneNumber = '';
    public string $position = '';
    public string $hiredAt = '';
    public bool $showSuccessModal = false;

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

    public function closeSuccessModal() : void
    {
        $this->showSuccessModal = false;
    }

    public function render() : View
    {
        return view('livewire.employee', [
            'employees' => EmployeeModel::all(),
        ]);
    }
}

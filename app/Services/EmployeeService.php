<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EmployeeService
{
    /**
     * @throws Exception
     */
    public function create(array $data): ?Employee
    {
        DB::beginTransaction();
        try {

            $employee = Employee::create($data);

            DB::commit();

            return $employee;
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            throw new Exception($exception->getMessage(), 500, $exception);
        }
    }

    /**
     * @throws Exception
     */
    public function update(Employee $employee, array $data): bool
    {
        DB::beginTransaction();
        try {

            $employee = $employee->update($data);

            DB::commit();

            return $employee;
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            throw new Exception($exception->getMessage(), 500, $exception);
        }
    }

    /**
     * @throws Exception
     */
    public function delete(Employee $employee): bool
    {
        DB::beginTransaction();
        try {

            $res = $employee->delete();

            DB::commit();

            return $res;
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            throw new Exception($exception->getMessage(), 500, $exception);
        }
    }
}

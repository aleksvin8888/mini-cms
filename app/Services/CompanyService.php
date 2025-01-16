<?php

namespace App\Services;

use App\Models\Company;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyService
{

    /**
     * @throws Exception
     */
    public function create(array $data): ?Company
    {
        DB::beginTransaction();
        try {

            $company = Company::creat($data);

            if (isset($data['logo'])) {
                $this->setLogo($company, $data['logo']);
            }

            DB::commit();

            return $company;
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
    public function update(Company $company, array $data): bool
    {
        DB::beginTransaction();
        try {

            if (isset($data['logo'])) {
                $this->setLogo($company, $data['logo']);
            }
            $company = $company->update($data);

            DB::commit();

            return $company;
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
    public function delete(Company $company): bool
    {
        DB::beginTransaction();
        try {

            if ($company->logo_path && Storage::disk('public')->exists($company->logo_path)) {
                Storage::disk('public')->delete($company->logo_path);
            }
            $res = $company->delete();

            DB::commit();

            return $res;
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
    private function setLogo(Company $company, $uploadedFile): void
    {
        try {

            $path = 'companies/'.$company->id.'/'.md5(uniqid(rand(1, 10000).'.', true)).'.'.$uploadedFile->extension();

            if ($company->logo_path && Storage::disk('public')->exists($company->logo_path)) {
                Storage::disk('public')->delete($company->logo_path);
            }

            Storage::disk('public')->put($path, file_get_contents($uploadedFile->getRealPath()));

            $company->logo_path = $path;
            $company->save();

            return;
        } catch (Exception $exception) {
            Log::error($exception->getMessage());
            Log::error($exception->getTraceAsString());
            throw new Exception($exception->getMessage(), 500, $exception);
        }
    }

}

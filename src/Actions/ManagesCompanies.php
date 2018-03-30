<?php

namespace Chelout\PhpSdk\Actions;

use Chelout\PhpSdk\Resources\Company;
use Chelout\PhpSdk\Resources\ApiResourceCollection;

trait ManagesCompanies
{
    public function companies(): ApiResourceCollection
    {
        $response = $this->get('companies');

        return new ApiResourceCollection($response, Company::class);
    }

    public function createCompany(array $data): Company
    {
        $response = $this->post('companies', $data);

        return new Company($response);
    }

    public function company(int $id): Company
    {
        $response = $this->get("companies/{$id}");

        return new Company($response);
    }

    public function updateCompany(int $id, array $data): Company
    {
        $response = $this->put("companies/{$id}", $data);

        return new Company($response);
    }

    public function deleteCompany(int $id)
    {
        $this->delete("companies/{$id}");
    }
}

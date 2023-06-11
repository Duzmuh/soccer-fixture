<?php

namespace App\Repository;

use App\Core\Helper\PaginationCalculate\PaginationCalculate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

abstract class AbstractRepository
{
	private $defaultModel;



	abstract protected function getDefaultModel(): string;

	public function __construct()
	{

		$this->defaultModel = App::make($this->getDefaultModel());
	}

	public function defaultModel()
	{

		return $this->defaultModel;
	}

	public function toArray()
	{

		return $this->defaultModel->get()->all();
	}



	public function find($id, array $selectField = [])
	{
		$primaryKey = $this->defaultModel->getKeyName();
		return $this->findByField($primaryKey, $id, $selectField);
	}


	public function getAllCollection()
	{

		$modelData = $this->toArray();
		$modelDataArray = [];

		foreach ($modelData as $mD) {

			$dataClass = $mD->getOriginal();
			$modelDataArray[] = $dataClass;
		}

		return $modelDataArray;
	}

	public function findByField(string $field, $value, array $selectField = [])
	{

		$result = $this->defaultModel->where($field, "=", $value);
		if ($selectField) {
			$result->select($selectField);
		}
		$result = $result->first();
		return $result ? ($result) : null;
	}

	public function findByFieldAll(string $field, $value, array $selectField = [])
	{
		$result = $this->defaultModel->where($field, "=", $value);
		if ($selectField) {
			$result->select($selectField);
		}

		$result = $result->get()
			->toArray();
		return $result ? ($result) : null;
	}
	public function findByFieldMultiResult(string $field, $value, array $selectField = [])
	{

		$result = $this->defaultModel->where($field, "=", $value);
		if ($selectField) {
			$result->select($selectField);
		}
		$result->get()
			->toArray();
		return $result ? ($result) : null;
	}


	public function findIn(array $ids): Collection
	{

		$primaryKey = $this->defaultModel->getKeyName();
		return $this->findInByField($primaryKey, $ids, $this->defaultModel);
	}

	public function findInByField(string $field, array $values, array $selectField = []): Collection
	{
		$item = $this->defaultModel->whereIn($field, $values);
		if ($selectField) {
			$item->select($selectField);
		}
		return $item->get()
			->toArray();
	}

	public function findByFieldAndCompany($id, $company_id, array $selectField = [])
	{
		$result = $this->defaultModel()->where("id", "=", $id)
			->where("company_id", "=", $company_id);
		if ($selectField) {
			$result->select($selectField);
		}
		$result = $result->first();
		return $result ? ($result) : null;
	}

	public function calculatePagination($page = 1)
	{

		$defaultPageLimit = 25;
		$paginationCalculate = App::make(PaginationCalculate::class);

		$paginationResult = $paginationCalculate->calculate(($page),
			$defaultPageLimit,
			$this->defaultModel::count()
		);

		$limit = $paginationResult->getLimit();
		$offset = $paginationResult->getOffset();
		$totalPage = $paginationResult->getTotalPage();

		return ["limit" => $limit, "offset" => $offset, "totalPage" => $totalPage];
	}

}

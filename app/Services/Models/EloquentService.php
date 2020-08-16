<?php

namespace App\Services\Models;

use Illuminate\Database\Eloquent\Model;

class EloquentService
{
	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	final public function getModel()
	{
		return $this->model;
	}

	final public function all($columns='*')
	{
		return $this->model->all($columns);
	}

	final public function create(array $data)
	{
		return $this->model->create($data);
	}

	final public function find($id, $columns="*")
	{
		return $this->model->find($id, $columns);
	}

	final public function findMany(array $ids, $columns="*")
	{
		return $this->model->findMany($ids, $columns);
	}

	final public function firstWhere($column, $value, $operator = "=")
	{
		return $this->firstWhere($column, $operator, $value);
	}

	final public function findWhere($column, $value, $operator = "=", $columns="*")
	{
		return $this->where($column, $operator, $value)->get($columns);
	}

	final public function update(array $data, $id)
	{
		return $this->find($id)->update($data);
	}

	final public function destroy($id)
	{
		return $this->model->destroy($id);
	}

	final public function with($relations, $columns="*")
	{
		return $this->with($relations)->get($columns);
	}

	final public function withDefaultsRelations($columns="*")
	{
		return  $this->model->getRelations() ? 
				$this->models->with($this->model->getRelations())->get($columns):
				$this->get();
	}

	final public function query()
	{
		return $this->model->query();
	}
}

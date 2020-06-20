<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use  Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

/**
 * Description of BaseRepository
 *
 * @author Ahmed sami Ahmed
 */
class BaseRepository
{
    /**
     *
     * @var Model
     */
    protected $model = null;

    protected function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     *
     * @param Model $model
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @author Ahmed sami Ahmed
     * to gel all methods of model here
     */
    public function __call($name, $arguments)
    {
        return $this->model->$name(...$arguments);
    }


    // update the existing model that came from the model binding
    public function updateExistingModel($attrs)
    {
        return $this->model->update($attrs);
    }

    // delete the existing model that came from the model binding
    public function deleteExistingModel()
    {
        return $this->model->delete();
    }

    /**
     * @param null $id
     * @return Model|null
     */
    public function new($id = null)
    {
        if ($id) {
            return $this->model;
        } else {
            return $this->model->get();
        }
    }

    /**
     * @param Model $model
     * @return bool|null
     * @throws \Exception
     */
    public function deleteByModel(Model $model)
    {
        return $model->delete();
    }

    /**
     * @param int $id
     * @return mixed
     * @author Ahmed sami Ahmed
     */
    public function getById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    public function getAllById(int $id)
    {
        return $this->model->where('role_id', $id)->get();
    }

    /**
     * Returns the first row of the selected resource
     * @return Model
     */
    public function getLast()
    {
        return $this->model->latest()->first();
    }

    /**
     *
     * @return int
     */
    public function count(): int
    {
        return $this->model->count();
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->model->get();
    }

    public function getAllWithTrashed()
    {
        return $this->model->withTrashed()->get();
    }

    /**
     * @param $field
     * @return mixed
     */
    public function getTranslatableFieldsNameFormate($field)
    {
        return $this->model->getTranslatableFieldsNameFormate($field);
    }

    /**
     * @param $key
     * @param $date
     * @return mixed
     * @author Ahmed sami Ahmed
     */
    public function updateOrCreate($key, $date)
    {
        return $this->model->updateOrCreate(
            $key,
            $date
        );
    }


    /**
     * @param  $params
     * @return mixed
     */
    public function create(...$params)
    {
        return $this->model->create(...$params);
    }

    /**
     * @param  $params
     * @return mixed
     */
    public function pluck(...$params)
    {
        return $this->model->pluck(...$params);
    }

    /**
     * @param int $id
     * @param array $date
     * @return Model
     * @author Ahmed sami Ahmed
     */
    public function update(int $id, array $date):Model
    {
        return $this->model->where("id",$id)->update($date);
    }

    // to get user criterias evaluation 
    public function getByUserAndCycle($user_id,$cycle_id){
        return $this->model->where ('user_id',$user_id )
        ->where('cycle_id', $cycle_id)
        ->get();
    }
    public function getTrash(){
        return $this->model->onlyTrashed()->get();
    }
    public function restoreTrash($id){
        return $this->model->onlyTrashed()->find($id)->restore();
    }
    public function getBySupervisorId($id){
        return $this->model->where('supervisor',$id)->get();
    }
    public function getUsersByRole(array $roles){
        $roles = Role::whereIn('name',$roles)->get();
        $roles_id = [];
        foreach($roles as $role){
            array_push($roles_id,$role->id);
        }

        $user_roles = DB::table('model_has_roles')->whereIn('role_id',$roles_id)->get();
        $users_id = [];
        foreach($user_roles as $user){
          array_push($users_id,$user->model_id);
      }
      $users = DB::table('users')->whereIn('id',$users_id)->get();
        return $users;
    }
   
}

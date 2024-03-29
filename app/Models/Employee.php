<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'patronymic', 'floor', 'wage'];

    public static function employeeSave($request)
    {
        try {
            DB::beginTransaction();
            $item = self::create($request->validated());
            DB::commit();
            return $item;
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return false;
        }
    }

    public static function employeeUpdate($request, $model)
    {
        try {
            DB::beginTransaction();
            $model->update($request->validated());
            $model->department()->sync($request->department);
            DB::commit();
            return $model;
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return false;
        }
    }

    public function department()
    {
        return $this->belongsToMany(Department::class);
    }
}

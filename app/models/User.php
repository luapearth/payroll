<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function userinformation()
	{
		return $this->hasOne('UserInformation');
	}

	public function employeeinformation()
	{
		return $this->hasOne('EmployeeInformation');
	}

	public function roles()
	{
		return $this->belongsToMany('Role', 'user_roles');
	}

	public function isEmployee()
	{
		$roles = $this->roles->toArray();
		return !empty($roles);
	}

	public function hasRole($check)
	{
		return in_array($check, array_fetch($this->roles->toArray(), 'name'));
	}

	public function getIdInArray($array, $term)
	{
		foreach ($array as $key => $value) {
			if ($value['name'] === $term) {
				return $value['id'];
			}
		}
	}

	public function addRole($role)
	{
		$assigned_roles = array();
		$roles = Role::all()->toArray();

		switch ($role) {
			case 'admin':
				$assigned_roles[] = $this->getIdInArray($roles, 'Department Manager');
				$assigned_roles[] = $this->getIdInArray($roles, 'Payroll Manager');
			case 'encoder':
				$assigned_roles[] = $this->getIdInArray($roles, 'DTR Manager');
			case 'employee':
				$assigned_roles[] = $this->getIdInArray($roles, 'View DTR');
				$assigned_roles[] = $this->getIdInArray($roles, 'View Payslip');
				break;
			default:
                throw new \Exception("The employee status entered does not exist");
			
		}

		$this->roles()->attach($assigned_roles);
	}

}

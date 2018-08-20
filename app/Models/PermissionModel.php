<?php

namespace App\Models;

use Artesaos\Defender\Permission;

class PermissionModel extends Permission
{

    /**
     * @param $roleName
     *
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach($this->roles as $role) {
            if($role->name == $roleName) {
                return true;
            }
        }

        return false;
    }

}
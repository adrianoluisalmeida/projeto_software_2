<?php
/**
 * Created by PhpStorm.
 * User: adriano
 * Date: 20/08/18
 * Time: 15:07
 */

namespace App\Models;

use Artesaos\Defender\Role;


class RoleModel extends Role
{
    public function perms()
    {
        return $this->belongsToMany(\Artesaos\Defender\Permission::class, 'permission_role', 'role_id');
    }

}
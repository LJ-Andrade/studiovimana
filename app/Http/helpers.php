<?php
    
    function typeTrd($type)
    {
       switch ($type) {
            case 'user':
                echo 'Usuario';
                break;
            case 'admin':
                echo 'Administrador';
                break;
            case 'superadmin':
                echo 'Super Administrador';
                break;

            default:
                echo '';
                break;
        }
    }

    function roleTrd($role)
    {
        switch ($role) {
            case 'author':
                echo 'Autor';
                break;
            case 'none':
                echo 'Sin Rol';
                break;
            default:
                echo '';
                break;
        }
    }
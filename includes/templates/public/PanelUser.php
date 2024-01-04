<div class="generalContainer">
    <h1 style="color: #262626;">Lista de usuarios</h1>
    <div class="buttonsAndTotal">
        <div class="containerTotalUsers">
            <div class="dashicons dashicons-admin-users"></div>   
            <span><strong><?php echo $total_users?></strong> usuarios totales</span>    
        </div>
        <div class="containerButtons">
            <button id="newUserActivate">Crear nuevo usuario</button>
        </div>
    </div>
    <div class="containerNewUser deactivate" id="containerNewUser">
        <form>
            <input type="text" placeholder="Nombre de usuario" />
            <input type="mail" placeholder="E-mail" />
            <input type="password" placeholder="Contraseña" />
        </form>
    </div>
    <div class="tableContainer">
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre Público</th>
                    <th>Rol</th>
                    <th>E-mail</th>
                    <th>Fecha de Registro</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                <?php 
                    $avatar = get_avatar_url($user->user_email);
                    $user_data = get_userdata($user->ID);
                    $user_rol = $all_roles[$user_data->roles[0]];
                    $date_registered = new DateTime($user->user_registered);
                ?>    
                    <tr>
                        <td>
                            <?php if($avatar):?>
                            <img src="<?php echo $avatar?>" style="width: 50px; height: 50px; border-radius: 25px; margin-right: 10px;"></img>
                            <?php else: ?>
                            <div class="profileAvatar">
                                <div class="dashicons dashicons-admin-users"></div>
                            </div>
                            <?php endif?>
                            <span><?php echo $user->user_login ?></span>
                        </td>
                        <td><?php echo $user->display_name ?></td>
                        <td>
                            <span class="role"> <?php echo $user_rol?> </span>
                        </td>
                        <td><?php echo $user->user_email ?></td>
                        <td><?php echo $date_registered->format('M jS, Y')?></td>
                        <td class="edit">Ver mas informacion</td>
                        <td class="delete">Eliminar</td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
<div>

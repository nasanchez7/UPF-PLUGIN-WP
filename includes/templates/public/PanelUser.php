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
        <form method="post">
            <input type="text" required name="newuser_username" placeholder="Nombre de usuario" />
            <input type="mail" required name="newuser_email" placeholder="E-mail" />
            <input type="password" required name="newuser_password" placeholder="Contraseña" />
            <input type="submit" value="Crear usuario"/>
        </form>
    </div>
    <div class="containerSendEmail" id="containerSendEmail">
        <div class="containerCloseEmail" >
            <span id="containerCloseEmail" class="dashicons dashicons-no-alt"></span>
        </div>
        <form method="post">
            <input id="sendemail_email" type="text" name="sendemail_email" value="nadirblanco02@gmail.com" readonly/>
            <input type="text" name="sendemail_asunto" placeholder="Asunto" />
            <input type="text" name="sendemail_cuerpo" placeholder="Cuerpo del mensaje" />
            <input type="submit" value="Enviar email"/>
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
                        <td class="edit">
                            <form method="post">
                                <input type="text" name="viewmore_userid" style="display: none;" value="<?php echo $user->ID ?>" readonly/>
                                <button>Ver mas informacion</button>
                            </form>
                        </td>
                        <td class="delete">
                            <form method="post">
                                <input type="text" name="delete_userid" style="display: none;" value="<?php echo $user->ID ?>" readonly/>
                                <button>Eliminar</button>
                            </form>
                        </td>
                        <td class="emailsend" onclick="activateEmail('<?php echo $user->user_email?>')">
                            <span class="dashicons dashicons-email"></span>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script>
        const sendEmailInput = document.getElementById('sendemail_email')
        const containerSendEmail = document.getElementById('containerSendEmail')
        const containerCloseEmail = document.getElementById('containerCloseEmail')
        function activateEmail(email){
            sendEmailInput.value = email;
            containerSendEmail.style.transform = 'translateX(0vw)';
        }
        containerCloseEmail.addEventListener('click', () => {
            containerSendEmail.style.transform = 'translateX(100vw)';
        })
    </script>
<div>

<div class="generalContainer">
    <h1 style="color: #262626;">Lista de usuarios</h1>
    <div class="buttonsAndTotal">
        <div class="containerTotalUsers">
            <div class="dashicons dashicons-admin-users"></div>   
            <span><strong><?php echo $total_users?></strong><?php if($total_users == 1){
                echo ' usuario activo en el sitio.';
            }else{
                echo ' usuarios totales activos en el sitio.';
            } ?></span>    
        </div>
        <div class="containerButtons">
            <button id="newUserActivate">Crear nuevo usuario</button>
        </div>
    </div>
    <div class="containerNewUser deactivate" id="containerNewUser">
        <form method="post">
            <label for="newuser_username">
                Nombre de usuario
                <input type="text" required name="newuser_username" placeholder="Nombre de usuario" />
            </label>
            <label for="newuser_email">
                E-mail
                <input type="mail" required name="newuser_email" placeholder="E-mail" />
            </label>
            <label for="newuser_password">
                Contraseña
                <input type="password" required name="newuser_password" placeholder="Contraseña" />
            </label>
            <label for="newuser_rol">
                Rol del usuario
                <select name="newuser_rol">
                    <?php foreach($all_roles as $key => $value) :?>
                        <option value="<?php echo $key?>"><?php echo $value?></option>
                    <?php endforeach;?>
                </select>
            </label>
            <input type="submit" value="Crear usuario"/>
        </form>
    </div>
    <div class="containerSendEmail" id="containerSendEmail">
        <div class="containerCloseEmail" >
            <span id="containerCloseEmail" class="dashicons dashicons-no-alt"></span>
        </div>
        <form method="post">
            <label for="email">
                Enviar mail a
                <input id="sendemail_email" type="email" name="sendemail_email" value="" readonly/>
            </label>
            <label for="sendemail_asunto">
                Asunto
                <input type="text" name="sendemail_asunto" placeholder="Asunto" required/>
            </label>
            <label for="sendemail_cuerpo">
                Mensaje
                <input type="text" name="sendemail_cuerpo" placeholder="Cuerpo del mensaje" required/>
            </label>
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
                    if($user->ID ){
                        $avatar = get_avatar_url($user->user_email);
                        $user_data = get_userdata($user->ID);
                        if($user_data){
                            $user_rol = $all_roles[$user_data->roles[0]];
                        }else{
                            $user_rol = '';
                        }
                        $date_registered = new DateTime($user->user_registered);
                    }
                ?>    
                    <?php if($user_rol):?>
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
                    <?php endif?>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php if(empty($users)):?>
        <div class="noUsersContainer">
            <p>No se encontraron mas usuarios.</p>    
        </div>
        <?php endif;?>
        <div class="containerPagination">
            <?php if($actualPage !== 1) :?>
                <form method="post">
                    <input type="number" name="previous_page" value="<?php echo $actualPage?>" style="display:none;" />
                    <input type="submit" value="Anterior pagina" />
                </form>
            <?php endif;?>
            <?php if(!empty($users)):?>
                <form method="post">
                    <input type="number" name="next_page" value="<?php echo $actualPage?>" style="display:none;" />
                    <input type="submit" value="Siguiente pagina" />
                </form>
            <?php endif;?>    
        </div>
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

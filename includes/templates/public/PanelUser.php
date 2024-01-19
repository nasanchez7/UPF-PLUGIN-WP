<div class="generalContainer">
    <h1 style="color: #262626;">List of users</h1>
    <div class="buttonsAndTotal">
        <div class="containerTotalUsers">
            <div class="dashicons dashicons-admin-users"></div>   
            <span><strong><?php echo $user_count['total_users']?></strong><?php if($user_count['total_users'] == 1){
                echo ' active user on the site.';
            }else{
                echo ' total active users on the site.';
            } ?></span>    
        </div>
        <div class="containerButtons">
            <button id="newUserActivate">New user</button>
        </div>
    </div>
    <div class="containerNewUser deactivate" id="containerNewUser">
        <form method="post">
            <label for="newuser_username">
                Username
                <input type="text" required name="newuser_username" placeholder="Username" />
            </label>
            <label for="newuser_email">
                E-mail
                <input type="mail" required name="newuser_email" placeholder="E-mail" />
            </label>
            <label for="newuser_password">
                Password
                <input type="password" required name="newuser_password" placeholder="Password" />
            </label>
            <label for="newuser_rol">
                Rol
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
                Send email to
                <input id="sendemail_email" type="email" name="sendemail_email" value="" readonly/>
            </label>
            <label for="sendemail_asunto">
                Subject
                <input type="text" name="sendemail_asunto" placeholder="Asunto" required/>
            </label>
            <label for="sendemail_cuerpo">
                Message
                <input type="text" name="sendemail_cuerpo" placeholder="Cuerpo del mensaje" required/>
            </label>
            <input type="submit" value="Send email"/>
        </form>
    </div>
    <div class="tableContainer">
        <div class="containerFilter">
            <div class="filter">
                <form method="post">
                    <span class="dashicons dashicons-filter"></span>
                    <label for="filter_role">
                        Role
                        <select name="filter_role">
                            <option <?php if($filter_role_actual == 'any') echo 'selected' ?> value="any">Any</option>
                            <?php foreach($all_roles as $key => $value) :?>
                                <option <?php if($filter_role_actual == $key) echo 'selected'?> value="<?php echo $key?>"><?php echo $value?></option>
                            <?php endforeach;?>
                        </select>  
                    </label>
                    <input type="submit" value="Filter"/>
                </form>
            </div>
        </div>  
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Display Name</th>
                    <th>Rol</th>
                    <th>E-mail</th>
                    <th>registration date</th>
                    <?php if (is_plugin_active('woocommerce/woocommerce.php')) :?>
                    <th></th>
                    <?php endif?>
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
                            <td>
                                <small class="ocultInfoMobile">DISPLAY NAME</small>
                                <strong>
                                <?php echo $user->display_name ?>
                                </strong>
                            </td>
                            <td>
                                <small class="ocultInfoMobile">ROLE</small>
                                <span class="role"> <?php echo $user_rol?> </span>
                            </td>
                            <td>
                                <small class="ocultInfoMobile">E-MAIL</small>
                                <strong>
                                <?php echo $user->user_email ?>
                                </strong>
                            </td>
                            <td>
                                <small class="ocultInfoMobile">REGISTRATION DATE</small>
                                <strong>
                                <?php echo $date_registered->format('M jS, Y')?>
                                </strong>
                            </td>
                            <?php if (is_plugin_active('woocommerce/woocommerce.php')) :?>
                            <td class="edit">
                                <form method="post">
                                    <input type="text" name="viewmore_userid" style="display: none;" value="<?php echo $user->ID ?>" readonly/>
                                    <button>WooCommerce info</button>
                                </form>
                            </td>
                            <?php endif?>
                            <td class="delete">
                                <form method="post">
                                    <input type="text" name="delete_userid" style="display: none;" value="<?php echo $user->ID ?>" readonly/>
                                    <button>Delete user</button>
                                </form>
                            </td>
                            <td class="emailsend" onclick="activateEmail('<?php echo $user->user_email?>')">
                                <small class="ocultInfoMobile">SEND EMAIL</small>
                                <span class="dashicons dashicons-email"></span>
                            </td>
                        </tr>
                    <?php endif?>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php if(empty($users)):?>
        <div class="noUsersContainer">
            <p>No more users found.</p>    
        </div>
        <?php endif;?>
        <div class="containerPagination">
            <div>
                <small>Page <?php echo $actualPage ?> </small>
            </div>
            <div class="containerPaginationButtons">
                <?php if($actualPage !== 1) :?>
                    <form method="post">
                        <input type="text" name="rol_actual" value="<?php echo $filter_role_actual?>" style="display:none;" />
                        <input type="number" name="firts_page" value="<?php echo 1?>" style="display:none;" />
                        <input type="submit" value="First page" />
                    </form>
                    <form method="post">
                        <input type="text" name="rol_actual" value="<?php echo $filter_role_actual?>" style="display:none;" />
                        <input type="number" name="previous_page" value="<?php echo $actualPage?>" style="display:none;" />
                        <input type="submit" value="Previous page" />
                    </form>
                <?php endif;?>

                <?php if(!empty($users) && $total_users > 5 && count($users) == 5):?>
                    <form method="post">
                        <input type="text" name="rol_actual" value="<?php echo $filter_role_actual?>" style="display:none;" />
                        <input type="number" name="next_page" value="<?php echo $actualPage?>" style="display:none;" />
                        <input type="submit" value="Next page" />
                    </form>
                <?php endif;?>   
            </div> 
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

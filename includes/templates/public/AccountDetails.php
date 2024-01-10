<div class="accountDetailsContainer">
    <h4>Account details (<?php echo $username_wc?>)</h4>
    <div class="containerAvatar">
        <?php if($avatar):?>
            <img src="<?php echo $avatar?>" style="width: 100px; height: 100px; border-radius: 50px; margin-right: 10px;"></img>
        <?php else: ?>
            <div class="profileAvatarDetails">
                <div class="dashicons dashicons-admin-users"></div>
            </div>
        <?php endif?>
            <div class="containerEmail">
                <small><?php echo $username_wc?></small>
                <strong><?php echo $user_email_wc?></strong>
                <span class="role"> <?php echo $user_rol?> </span>
            </div>
    </div>
    <div class="division">
        <strong>Billing information</strong>
    </div>
    <div class="contenedorListasInfo">
        <div class="lista">
            <div class="itemLista">
                <small>First name</small> 
                <strong>
                    <?php if($billing_first_name) :?>
                        <?php echo $billing_first_name ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Last name</small> 
                <strong>
                    <?php if($billing_last_name) :?>
                        <?php echo $billing_last_name ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Company</small> 
                <strong>
                    <?php if($billing_company) :?>
                        <?php echo $billing_company ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
        </div>
         <div class="lista">
            <div class="itemLista">
                <small>Address 1</small> 
                <strong>
                    <?php if($billing_address_1) :?>
                        <?php echo $billing_address_1 ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Address 2</small> 
                <strong>
                    <?php if($billing_address_2) :?>
                        <?php echo $billing_address_2 ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>City</small> 
                <strong>
                    <?php if($billing_city) :?>
                        <?php echo $billing_city ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
        </div>
        <div class="lista">
            <div class="itemLista">
                <small>State</small> 
                <strong>
                    <?php if($billing_state) :?>
                        <?php echo $billing_state ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Postcode</small> 
                <strong>
                    <?php if($billing_postcode) :?>
                        <?php echo $billing_postcode ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Country</small> 
                <strong>
                    <?php if($billing_country) :?>
                        <?php echo $billing_country ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
        </div>
        <div class="lista">
            <div class="itemLista">
                <small>Phone</small> 
                <strong>
                    <?php if($billing_phone) :?>
                        <?php echo $billing_phone ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
        </div>
    </div>
    <div class="division">
        <strong>Shipping information</strong>
    </div>
    <div class="contenedorListasInfo">
        <div class="lista">
            <div class="itemLista">
                <small>First name</small> 
                <strong>
                    <?php if($shipping_first_name) :?>
                        <?php echo $shipping_first_name ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Last name</small> 
                <strong>
                    <?php if($shipping_last_name) :?>
                        <?php echo $shipping_last_name ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Company</small> 
                <strong>
                    <?php if($shipping_company) :?>
                        <?php echo $shipping_company ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
        </div>
         <div class="lista">
            <div class="itemLista">
                <small>Address 1</small> 
                <strong>
                    <?php if($shipping_address_1) :?>
                        <?php echo $shipping_address_1 ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Address 2</small> 
                <strong>
                    <?php if($shipping_address_2) :?>
                        <?php echo $shipping_address_2 ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>City</small> 
                <strong>
                    <?php if($shipping_city) :?>
                        <?php echo $shipping_city ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
        </div>
        <div class="lista">
            <div class="itemLista">
                <small>State</small> 
                <strong>
                    <?php if($shipping_state) :?>
                        <?php echo $shipping_state ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Postcode</small> 
                <strong>
                    <?php if($shipping_postcode) :?>
                        <?php echo $shipping_postcode ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
            <div class="itemLista">
                <small>Country</small> 
                <strong>
                    <?php if($shipping_country) :?>
                        <?php echo $shipping_country ?>
                    <?php else: ?>
                        No information found
                    <?php endif?>
                </strong>
            </div>
        </div>
    </div>
</div>
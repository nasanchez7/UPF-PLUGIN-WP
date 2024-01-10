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
    <div class="division">
        <strong>Orders List<?php if(!empty($orders)) echo '('.count($orders).')'?></strong>
    </div>
    <div class="ordersContainer">
        <?php if(!empty($orders)) : ?>
            <?php foreach($orders as $order):
            $order_data = $order->get_data();
            $date_order = new DateTime($order->get_date_created());
            ?>
                <div class="orderContainer">
                    <div class="informationContainer">
                        <div class="orderNameContainer">
                            <strong>Order #<?php echo $order_data['id']?></strong>
                            <small><?php echo $date_order->format('M jS, Y')?></small>
                        </div>
                        <div class="moreInfomationContainer">
                            <strong class="status"><?php echo $order->get_status() ?></strong>
                            <span id="button<?php echo $order_data['id']?>" onclick="orderDetail('<?php echo $order_data['id']?>')" class="dashicons dashicons-arrow-down-alt2"></span>
                        </div>
                    </div>
                    <div class="orderOcult" id="<?php echo $order_data['id']?>">
                        <div class="containerDetailsOrder">
                            <div class="lista">
                                <div class="itemLista">
                                    <strong>Payment method</strong>
                                    <small>
                                        <?php if($order->get_payment_method_title()) :?>
                                            <?php echo $order->get_payment_method_title() ?>
                                        <?php else: ?>
                                            No information found
                                        <?php endif?>
                                    </small>
                                </div>
                                <div class="itemLista">
                                    <strong>Customer's note</strong>
                                    <small>
                                        <?php if($order->get_customer_note()) :?>
                                            <?php echo $order->get_customer_note() ?>
                                        <?php else: ?>
                                            No information found
                                        <?php endif?>
                                    </small>
                                </div>
                                <div class="itemLista">
                                    <strong>Shipping method</strong>
                                    <small>
                                        <?php if($order->get_shipping_to_display()) :?>
                                            <?php echo $order->get_shipping_to_display(); ?>
                                        <?php else: ?>
                                            No information found
                                        <?php endif?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php endforeach?>
        <?php else: ?>
            <p>Orders not found</p>
        <?php endif?>
    </div>



    <script>
        let isOcult = true;
        const orderDetail = (id) => {
            const orderId = id.toString()
            const orderDetailContainer = document.getElementById(orderId)
            const buttonOrder =  document.getElementById('button' + orderId)
            if(isOcult){
                orderDetailContainer.classList.remove('orderOcult')
                buttonOrder.classList.add('dashicons-arrow-up-alt2')
                buttonOrder.classList.remove('dashicons-arrow-down-alt2')
                isOcult = false;
            }else{
                orderDetailContainer.classList.add('orderOcult')
                buttonOrder.classList.add('dashicons-arrow-down-alt2')
                buttonOrder.classList.remove('dashicons-arrow-up-alt2')
                isOcult = true;
            }
        }   
    </script>

</div>
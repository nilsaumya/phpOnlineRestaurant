<?php
    $items_id=$_POST['items_id'];
    $i_name=$_POST['i_name'];
    $i_price=$_POST['i_price'];
    $i_qty=$_POST['i_qty'];
    $item_array=array(
        'items_id'=>$items_id,
        'i_name'=>$i_name,
        'i_price'=>$i_price,
        'i_qty'=>$i_qty
    );
    $cart_data[] = $item_array;
    $item_data = json_encode($cart_data);
    print_r($item_data);          
    setcookie('shopping_cart', $item_data, time() + (86400 * 30));
?>
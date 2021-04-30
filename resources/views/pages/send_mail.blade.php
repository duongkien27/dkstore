<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email thông báo</title>
</head>
<body>
	<h2>{{$name}}</h2>
	<h4>{{$body}}</h4>
	<p>Tên khách hàng: </p>
	<?php
        $customer_name = Session::get('customer_name');
        echo $customer_name;
    ?>
    <p>E-mail: </p>
	<?php
        $customer_email = Session::get('customer_email');
        echo $customer_email;
    ?>
    <p>Số điện thoại: </p>
	<?php
        $customer_phone = Session::get('customer_phone');
        echo $customer_phone;
    ?>
    <p>Mã đơn hàng: </p>
	<?php
        $order_id = Session::get('order_id');
        echo $order_id;
    ?>
</body>
</html>
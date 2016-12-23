<?php 
    if(/*$user->role == 'admin' or*/ $user['access'] == 'admin'){
 ?>
        <li><a href="{{url('/access_manage')}}">帳號管理</a></li>
<?php
    }
?>
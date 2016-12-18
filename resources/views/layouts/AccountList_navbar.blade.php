<?php 
    if(/*$user->role == 'admin' or*/ $user['access'] == 'admin'){
 ?>
        <li><a href="{{url('/access_manage')}}">access_manage</a></li>
<?php
    }
?>
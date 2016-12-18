<?php 
    if(/*$user->role == 'admin' or*/ $user['access'] == 'admin'){
 ?>
        <li><a href="{{url('/Access_Manage')}}">AccountList</a></li>
<?php
    }
?>
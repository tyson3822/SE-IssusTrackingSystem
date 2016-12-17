<?php 
    if($user['access'] == 'admin'){
 ?>
        <li><a href="{{url('/Access_Manage')}}">access_manage</a></li>
<?php
    }
?>
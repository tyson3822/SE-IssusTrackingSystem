<?php 
    if($user['access'] == 'admin'){
 ?>
        <li><a href="{{url('/access_manage')}}">access_manage</a></li>
<?php
    }
?>
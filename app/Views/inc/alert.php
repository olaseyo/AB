<?php
if(isset($data['response']['success'])){
    echo "<div class='alert alert-success'>".$data['response']['success']."</div>";
}elseif(isset($data['response']['error'])){
    echo "<div class='alert alert-danger'>".$data['response']['error']."</div>";
}
?>
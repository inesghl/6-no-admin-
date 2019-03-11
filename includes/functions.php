<?php 
function message_if_login_or_register_fails($fail_url, $message){
  if(isset($_GET[$fail_url])){
    return '<p class="red_text">' . $message . '</p>';
  }
}

function sum_each_product($first_number, $second_number){
  return $first_number * $second_number;
}
?>







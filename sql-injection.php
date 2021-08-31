<?php

function case1() {
  $context['email_address'] = $_GET['email_address'];
  mysqli_query($c, "SELECT distinct user_id, company_id FROM user where site_id = " . $context['site_id'] . " and user_email = '" . $context['email_address'] . "'");
}

function case2() {
  $context['email_address'] = "hello@example.com";
  mysqli_query($c, "SELECT distinct user_id, company_id FROM user where site_id = " . $context['site_id'] . " and user_email = '" . $context['email_address'] . "'");
}


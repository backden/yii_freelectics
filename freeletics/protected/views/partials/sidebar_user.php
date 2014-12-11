<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="" id="wrapper">
<div id="sidebar-wrapper">
  <ul class="sidebar-nav">
    <li class="sidebar-brand">
      <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
    </li>
    <li>
      <a href="#">Dashboard</a>
    </li>
    <li>
      <a href="#">Shortcuts</a>
    </li>
    <li>
      <a href="#">Overview</a>
    </li>
    <li>
      <a href="#">Events</a>
    </li>
    <li>
      <a href="#">About</a>
    </li>
    <li>
      <a href="#">Services</a>
    </li>
    <li>
      <a href="#">Contact</a>
    </li>
  </ul>
</div>
</div>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
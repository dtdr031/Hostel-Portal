<?php

//code for the header section
include "includes/header.php";
?>

<?php
//code for the navigation section
include "includes/navigation.php";
?>
<br><br>
<div class="container">
<h2 class="text-primary bold text-center">Frequently Asked Questions(FAQs)</h2><br><br>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10"> 
    <div class="panel-group margin_0" id="accordion1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse1">
                        <i class="rt-icon2-bubble highlight"></i>
                        Lorem Ipsum
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium amet ea dicta neque, ut quis omnis quos nam, pariatur, minus, fugit suscipit aspernatur sint ullam quas explicabo. Alias, officiis, dolor!
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse2" class="collapsed">
                        <i class="rt-icon2-bubble highlight"></i>
                        Dolor Sit Amet
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem facere doloremque ut dolores laudantium nihil at, repudiandae est numquam fuga tempora totam sequi quidem saepe officiis sint beatae, magni fugit.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse3" class="collapsed">
                        <i class="rt-icon2-bubble highlight"></i>
                        Corporis Iste
                    </a>
                </h4>
            </div>
            <div style="height: 0px;" id="collapse3" class="panel-collapse collapse">
                <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At nobis omnis delectus, asperiores quo obcaecati et iste corporis necessitatibus tempora aspernatur doloribus. Ut deleniti commodi dicta distinctio sit enim quidem!
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse4" class="">
                        <i class="rt-icon2-bubble highlight"></i>
                        Adipisicing Elit
                    </a>
                </h4>
            </div>
            <div style="" id="collapse4" class="panel-collapse collapse in">
                <div class="panel-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At nobis omnis delectus, asperiores quo obcaecati et iste corporis necessitatibus tempora aspernatur doloribus. Ut deleniti commodi dicta distinctio sit enim quidem!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At nobis omnis delectus, asperiores quo obcaecati et iste corporis necessitatibus tempora aspernatur doloribus. Ut deleniti commodi dicta distinctio sit enim quidem!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At nobis omnis delectus, asperiores quo obcaecati et iste corporis necessitatibus tempora aspernatur doloribus. Ut deleniti commodi dicta distinctio sit enim quidem!
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. At nobis omnis delectus, asperiores quo obcaecati et iste corporis necessitatibus tempora aspernatur doloribus. Ut deleniti commodi dicta distinctio sit enim quidem!                       
                </div>
            </div>
        </div>
    </div> 
</div>
    <div class="col-md-1"></div></div>
</div><br><br>
 <style>
.panel-default > .panel-heading {
  background-color: transparent;
  border: medium none;
  border-radius: 0;
  color: inherit;
  padding: 0;
  position: relative;
}    
.panel-heading .panel-title > a {
  background-color: #87C540;
  border: medium none;
  color: #ffffff;
  display: block;
  font-family: Arial,Helvetica,sans-serif;
  line-height: 28px;
  padding: 11px 65px 11px 40px;
  word-wrap: break-word;
}
    
.panel-heading .panel-title > a::after {
  bottom: 0;
  content: "▲";
  font-family: "Roboto",sans-serif;
  font-size: 20px;
  font-weight: 300;
  letter-spacing: -1px;
  line-height: 48px;
  position: absolute;
  right: 0;
  text-align: center;
  top: 0;
  width: 60px;
}  
.panel-heading .panel-title > a.collapsed::after {
  content: "▼";
}    
.panel-body{
  height:100px;
  overflow: auto;
}
</style>

 <?php  
 //code for the footer section
 
 include "includes/footer.php";
 ?>


<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';


?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!
		<?php
		if(Yii::$app->user->isGuest){ 
		 
		}else{
		echo Yii::$app->user->Identity->username; }?>
		
		</h1>
		
		

        <p class="lead">This is the official page of the central printing project</p>

       
    </div>

    <div class="body-content">

        

    </div>
</div>

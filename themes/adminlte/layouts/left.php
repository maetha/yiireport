<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use dektrium\user\models\User;
?>

<aside class="main-sidebar">

    <section class="sidebar">
        
        <?=
        Nav::widget(
                [
                    'encodeLabels' => false,
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        '<li class="header"></li>',
                        Yii::$app->user->isGuest ?
                                ['label' => '<i class="glyphicon glyphicon-log-in"></i> เข้าสู่ระบบ', 'url' => ['/user/security/login']] :
                                ['label' => '<i class="glyphicon glyphicon-user"></i> (' . Yii::$app->user->identity->username . ')', 'items' => [
//                    ['label' => 'Profile', 'url' => ['/user/settings/profile']],
//                    ['label' => 'ผู้ใช้งาน', 'url' => ['/user/settings/account']],
                                ['label' => 'Logout', 'url' => ['/user/security/logout'], 'linkOptions' => ['data-method' => 'post']],
                            ]],
                    ],
                ]
        );
        ?>
        <ul class="sidebar-menu">
            <li class="treeview"> 
                <a href="#">
                    <i class="glyphicon glyphicon-cog"></i> <span>ตั้งค่าระบบ</span>
                    <i class="fa pull-right fa-angle-down"></i>
                </a>
                <ul class="treeview-menu">
                   <li><a href="<?php echo Url::to(['admin/assignment']); ?>"><i class="fa fa-circle text-green"></i> <span> จัดการผู้ใช้งาน</span> <small class="label pull-right bg-blue"></small></a> </li>
                    
                </ul>
        </ul>
        <ul class="sidebar-menu">

            <li class="header"><h5><div class="label label-default"> เมนู</div></h5></li>            
            <li><a href="<?php echo Url::to(['groups/index']); ?>"><i class="fa fa-circle text-aqua"></i> <span> กลุ่มงาน</span><small class="label pull-right bg-red"></small></a></li> 
            <li><a href="<?php echo Url::to(['departments/index']); ?>"><i class="fa fa-circle text-aqua"></i> <span> หน่วยงาน</span><small class="label pull-right bg-red"></small></a></li> 
            <li><a href="<?php echo Url::to(['departments/create']); ?>"><i class="fa fa-circle text-aqua"></i> <span> เพิ่มหน่วยงาน</span><small class="label pull-right bg-red"></small></a></li> 

        </ul>
        
        <ul class="sidebar-menu">
            <li class="treeview active"> 
                <a href="#">
                    <i class="glyphicon glyphicon-cog"></i> <span>รายงาน</span>
                    <i class="fa pull-right fa-angle-down"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo Url::to(['/hosxpreport/reports/opddiag']); ?>"><i class="fa fa-circle text-green"></i> <span> 20อันดับโรคOPD</span> <small class="label pull-right bg-blue"></small></a> </li>
                    
                </ul>
        </ul>
    </section>

</aside>
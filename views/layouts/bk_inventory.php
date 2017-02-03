<div class="nav-side-menu">
        <div class="brand">Brand Logo</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
      
            <div class="menu-list">
      
                <ul id="menu-content" class="menu-content collapse out">
                    <li>
                        
                        <?= Html::a('<i class="fa fa-dashboard fa-lg"></i> Home', ['/site/index']) ?>
                    </li>
                    <li>
                        <a href="<?= Url::to('/site/dashboard')?>">
                            <i class="fa fa-dashboard fa-lg"></i> Dashboard
                        </a>
                    </li>

                    <li  data-toggle="collapse" data-target="#products" class="collapsed active">
                        <a href="#"><i class="fa fa-gift fa-lg"></i> Admin <span class="arrow"></span></a>
                    </li>
                    
                    <ul class="sub-menu collapse" id="products">
                        <li class="active"><a href="#">Employee Attendance</a></li>
                        <li><a href="#">Employee Profile</a></li>
                        <li><a href="#">Who's In</a></li>
                    </ul>


                    <li data-toggle="collapse" data-target="#service" class="collapsed">
                        <a href="#"><i class="fa fa-globe fa-lg"></i> Human Resource <span class="arrow"></span></a>
                    </li>  

                    <ul class="sub-menu collapse" id="service">
                        <li>Payroll</li>
                        <li>Salary rate</li>
                        <li>Employee Profile</li>
                        <li>Daily Time Record</li>
                    </ul>


                    <li data-toggle="collapse" data-target="#new" class="collapsed">
                        <a href="#"><i class="fa fa-car fa-lg"></i> Inventory <span class="arrow"></span></a>
                    </li>
                    <ul class="sub-menu collapse" id="new">
                        <li>Items In</li>
                        <li>Items Out</li>
                        <li>Stock on Hand Report</li>
                    </ul>

                </ul>
         </div>
    </div>
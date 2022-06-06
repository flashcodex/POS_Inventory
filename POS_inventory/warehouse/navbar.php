<!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
        <a class="navbar-brand" >Transaction Processing System</a>
            </div>
			
			<ul class=" nav navbar-nav">
				<li>
                   <a href="index.php"><i class="fa fa-inbox fa-fw"></i> Request</a>
                </li>
                <li>
                   <a href="reports.php"><i class="fa fa-book"></i> Reports</a>
                </li>
                <li>
                   <a href="employee.php"><i class="fa fa-group"></i> Employee</a>
                </li>
                <li>
                   <a href="cash_receive.php"><i class="fa fa-money"></i> Cash to Send</a>
                </li>
		
			</ul>
			
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="glyphicon glyphicon-lock"></span> <?php echo "$user"; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu">
						<li><a href="#account" data-toggle="modal"><span class="glyphicon glyphicon-lock"></span>  My Account</a></li>
						<li class="divider"></li>
						<li><a href="#profile" data-toggle="modal"><span class="glyphicon glyphicon-user"></span>  My Profile</a></li>
						<li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                    </ul>   
                </li>
            </ul>
        </nav>
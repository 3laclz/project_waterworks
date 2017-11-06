<!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/customer.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $objr_name["name"]?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/customer.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $objr_name["name"];?>  <?php echo $objr_name["lastname"];?>
                  <small>ผู้ใช้น้ำ</small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="profile_customer.php" class="btn btn-default btn-flat">ข้อมูลส่วนตัว</a>
                </div>
                <div class="pull-right">
                  <a href="../login/check_login/logout.php" class="btn btn-default btn-flat">ออกจากระบบ</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- /account -->
 <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $objResult["Name"];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>ข้อมุลผู้ใช้น้ำประปา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="edit_user.php"><i class="fa fa-circle-o"></i>จัดการเเก้ไขข้อมูลผู้ใช้้นำ</a></li>
            <li><a href="insert_user.php"><i class="fa fa-circle-o"></i>เพิ่มรายชื่ิผู้ใช้น้ำ</a></li>
            <li><a href="user_data.php"><i class="fa fa-circle-o"></i>รายชื่อผู้ใช้้นำทั้งหมด</a></li>
          </ul>
        </li>
        <li class="treeview">
         <a href="#">
            <i class="fa fa-dashboard"></i> <span>ข้อมุลเจ้าหน้าที่</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="edit_user.php"><i class="fa fa-circle-o"></i>เเก้ไขข้อมุลเจ้าหน้าที่</a></li>
            <li><a href="data_ep.php"><i class="fa fa-circle-o"></i>ข้อมุลเจ้าหน้าที่</a></li>
            <li><a href="insert_user.php"><i class="fa fa-circle-o"></i>เพิ่มรายชื่อเจ้าหน้าที่</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>ข้อมุลการเเจ้งปัญหา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="form_apply.php"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>ข้อมุลอุปกรณ์</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_tool.php"><i class="fa fa-circle-o"></i>รายการอุปกรณ์</a></li>
            <li><a href="withdraw_tool.php"><i class="fa fa-circle-o"></i> เบิกถอนอุปกรณ์</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>ข้อมุลสถิติ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        
       
        
        
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>คู่มือ</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
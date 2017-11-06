<section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $objResult["Name"];?></p><br>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
      </form>
     
      
      <!-- จัดการข้อมูลผู้ใช้น้ำประปา  -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview ">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>จัดการข้อมูลผู้ใช้น้ำประปา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="edit_user.php"><i class="fa fa-circle-o"></i>จัดการเเก้ไขข้อมูลผู้ใช้้นำ</a></li>
            <li><a href="insert_user.php"><i class="fa fa-circle-o"></i>เพิ่มรายชื่อผู้ใช้น้ำ</a></li>
            <li><a href="user_status.php"><i class="fa fa-circle-o"></i>จัดการสถานะผู้ใช้น้ำ</a></li>
            <li><a href="data_user.php"><i class="fa fa-circle-o"></i>ตรวจสอบข้อมูลผู้ใช้น้ำประปา</a></li>
          </ul>
        </li>
        
        <!-- จัดการข้อมูลเจ้าหน้าที่   -->
        <li class="treeview">
         <a href="#">
            <i class="fa fa-dashboard"></i> <span>จัดการข้อมูลเจ้าหน้าที่</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="edit_personnel.php"><i class="fa fa-circle-o"></i>จัดการเเก้ไขข้อมูลเจ้าหน้าที่</a></li>
            <li><a href="insert_personnel.php"><i class="fa fa-circle-o"></i>เพิ่มรายชื่อเจ้าหน้าที่</a></li>
          </ul>
        </li>
         
         <!-- ระบบจัดการน้ำประปา   -->
      <li class="treeview">
         <a href="#">
            <i class="fa fa-dashboard"></i> <span>ระบบจัดการน้ำประปา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="insert_meter.php"><i class="fa fa-circle-o"></i>จัดการมิเตอร์น้ำประปา</a></li>
            <li><a href="menu_use_water/seach_listwater.php"><i class="fa fa-circle-o"></i>จัดการใบชำระค่าน้ำประปา</a></li>
          </ul>
        </li>
        
        <!-- รายงานการเเจ้งปัญหา   -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>รายงานการเเจ้งปัญหา</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="report/form_report.php"><i class="fa fa-circle-o"></i> กล่องข้อความ</a></li>
          </ul>
        </li>
        
        <!-- ระบบจัดการอุปกรณ์  -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>ระบบจัดการอุปกรณ์</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="data_tool/tool.php"><i class="fa fa-circle-o"></i>รายการอุปกรณ์</a></li>
          </ul>
        </li>
        
        <!-- ข้อมูลสถิติ  -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>ข้อมูลสถิติ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="statistic/st_previous.php"><i class="fa fa-circle-o"></i> ข้อมูลสถิติ</a></li>
          </ul>
        </li>
        
        <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>คู่มือ</span></a></li>
      </ul>
    </section>
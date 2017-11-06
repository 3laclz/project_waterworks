<div class="col-md-3">
    <div class="box box-solid">
        <div class="box-header with-border">
           <h3 class="box-title">เมนู</h3>
        </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
               <!-- ถอนอุปกรณ์ -->
                <li><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-minus-square"></i> ถอนอุปกรณ์ </a></li>
                  <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog modal-lg">
                     <form action="withdraw_tool.php" method="post" target="_blank">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h2 class="fa fa-minus-square modal-title"> ถอนอุปกรณ์  </h2>
                        </div>
                        <div class="modal-body col-md-12 table-responsive mailbox-messages">
                            <div class="form-group">
                              <label for="txttoolid"> วัตถุประสงค์</label>
                              <br>
                              <label class="radio-inline "><input type="radio" name="type" value="ติดตั้งน้ำประปา">ติดตั้งน้ำประปา</label>
                              <br>
                             <label class="radio-inline"><input type="radio" name="type" value="ซ่อมบำรุง">ซ่อมบำรุง</label>
                            </div>
                            <div class="table-responsive mailbox-messages">
                            <font size="2" color="red">*กรุณาเลือกรายการที่ต้องการถอน</font>
                            <table class="table table-hover table-striped table-bordered">
                              <tbody> 
                              <tr>
                                <th width="15%"> 
                                      <div class="mailbox-controls">
                                        <!-- Check all button -->
                                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                                        </button>
                                        <span> เลือกทั้งหมด</span>
                                      </div>
                                </th>
                                <th class="text-center" width="10%">ลำดับ</th>
                                <th class="text-center"width="10%">รหัสอุปกรณ์</th>
                                <th class="text-center" width="35%">ชื่ออุปกรณ์</th>
                                <th class="text-center" width="10%">จำนวน</th>
                               <?php foreach ($objq_tool as $tool):?> 
                              <tr>
                                <td width="15%"><input type="checkbox" name="menu[]" value="<?php echo $tool['Num']?>"></td>
                                <td class="text-center" width="10%"><?php  echo $num;?></td>
                                <td class="text-center" width="10%"><?php echo $tool['ID_Tool']?></td>
                                <td class="text-center" width="35%"><?php echo $tool['name']?></td>
                                <td class="text-center" width="15%"><?php echo $tool['Num_Tool']?></td>
                              </tr>
                              <?php $num++?>
                              <?php endforeach;?>
                              </tbody>
                            </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit"  class="btn btn-info pull-left">ตกลง</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
               <!-- ถอนอุปกรณ์ -->
               <!--เพิ่มจำนวนอุปกรณ์ -->
                <li><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-plus-square"></i> เพิ่มอุปกรณ์</a></li>
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="fa fa-minus-square modal-title"> เพิ่มอุปกรณ์ </h3>
                        </div>
                        <div class="modal-body">
                         <table class="table table-hover table-striped table-bordered">
                              <tbody> 
                              <tr>
                                <th class="text-center" width="10%">ลำดับ</th>
                                <th width="20%">รหัสอุปกรณ์</th>
                                <th class="text-center" width="50%">ชื่ออุปกรณ์</th>     
                                <th class="text-center" width="20%">เพิ่ม</th>
                               <?php $num=1; foreach ($objq_tool as $tool):?> 
                              <tr>
                                <td class="text-center" width="10%"><?php  echo $num;?></td>
                                <td class="text-center" width="20%"><?php echo $tool['ID_Tool']?></td>
                                <td class="text-center" width="60%"><?php echo $tool['name']?></td>
                                <td ><a target="_blank" href="add_tool.php?ID_Tool=<?php echo $tool['ID_Tool']?>" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span></a></td>     
                              </tr>
                              <?php $num+=1; endforeach;?>
                              </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 <!--เพิ่มจำนวนอุปกรณ์ -->
                 <!-- เเก้ไขอุปกรณ์  -->     
                <li><a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-cogs"></i> เเก้ไขรายการอุปกรณ์</a></li>
                 <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="fa fa-minus-square modal-title"> เเก้ไขรายการอุปกรณ์ </h3>
                        </div>
                        <div class="modal-body">
                          <table class="table table-hover table-striped table-bordered">
                              <tbody> 
                              <tr>
                                <th class="text-center" width="10%">ลำดับ</th>
                                <th width="20%">รหัสอุปกรณ์</th>
                                <th class="text-center" width="40%">ชื่ออุปกรณ์</th>
                                <th class="text-center" width="10%">จำนวน</th>
                                <th class="text-center" width="10%">ราคา(บาท)</th>
                                <th class="text-center" width="10%">เเก้ไข</th>
                               <?php $num=1; foreach ($objq_tool as $tool):?> 
                              <tr>
                                <td class="text-center" width="10%"><?php  echo $num?></td>
                                <td width="20%"><?php echo $tool['ID_Tool']?></td>
                                <td width="40%"><?php echo $tool['name']?></td>
                                <td class="text-center" width="10%"><?php echo $tool['Num_Tool']?></td>
                                <td class="text-center" width="10%"><?php echo $tool['price']?></td>
                                 <td class="text-center"><a target="_blank" href="edit_tool.php?ID_Tool=<?php echo $tool['ID_Tool']?>" class="btn btn-info"><span class="glyphicon glyphicon-cog"></span></a></td>     
                              </tr>
                              <?php $num+=1; endforeach;?> 
                              </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        </div>       
                     </div>
                   </div>
                </div>
               <!-- //เเก้ไขอุปกรณ์  -->
               <!--เพิ่มรายการอุปกรณ์ -->
                <li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-filter"></i> เพิ่มรายการอุปกรณ์ </a></li>
                 <div class="modal fade" id="myModal3" role="dialog">
                    <div class="modal-dialog modal-lg">
                    <form action="act_tool/insert_tool.php" method="get">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h3 class="fa fa-minus-square modal-title"> เพิ่มรายการอุปกรณ์  </h3>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                              <label for="txttoolid">รหัสอุปกรณ์</label>
                              <input type="text" name="txttoolid" class="form-control" id="txtuserid">
                            </div>
                            <div class="form-group">
                              <label for="txtname_tool">ชื่ออุปกรณ์</label>
                              <input type="text" name="txtname_tool" class="form-control" id="txtuserid" >
                            </div>
                            <div class="form-group">
                              <label for="txtnum">จำนวน</label>
                              <input type="text" name="txtnum" class="form-control" id="txtname" >
                            </div>
                            <div class="form-group">
                              <label for="txtprice">ราคา</label>
                              <input type="text" name="txtprice" class="form-control" id="txtname" >
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-info pull-left" onclick="if(confirm('ยืนยันการบันทึก')) return true; else return false;">บันทึก</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                  <!--เพิ่มรายการอุปกรณ์ -->
                  <!--ประวัติเพิ่ม-ถอน อุปกรณ์ -->
                  <li><a target="_blank" href="add-withdraw_tool.php" ><i class="fa fa-exchange"></i> ประวัติเพิ่ม-ถอนอุปกรณ์ </a></li>
                  <!--ประวัติเพิ่ม-ถอน อุปกรณ์ -->
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          
          <!-- /.box -->
</div>
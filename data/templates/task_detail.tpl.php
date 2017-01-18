<div class="body">
<h1 class="card-title">学籍变更申请表</h1>
<div class="blank"></div>
  	<table width="100%" border="0" cellspacing="1" cellpadding="0" class="card" style="width:19cm; margin:0 auto;">
      <tr>
        <td width="70">姓名</td>
        <td><?php echo $task['name']?></td>
      </tr>
      <tr>
        <td>所在学校</td>
        <td><?php echo $task['school']?></td>
      </tr>
  <tr>
    <td>性别</td>
    <td><?php echo $lang['sex'][$task['sex']]?></td>
      </tr>
  <tr>
    <td>学籍号</td>
    <td><?php echo $task['studentid']?></td>
      </tr>
  <tr>
    <td>身份证号</td>
    <td><?php echo $task['idnumber']?></td>
      </tr>
  <tr>
    <td>变更类型</td>
    <td><?php echo $task['tasktype']?></td>
      </tr>
  <tr>
        <td>提交时间</td>
        <td><?php echo $task['dateline']?></td>
      </tr>
  <tr>
    <td>变更时间</td>
    <td><?php echo $task['changetime']?></td>
      </tr>
  <tr>
        <td>经办人</td>
        <td><?php echo $task['manager']?></td>
      </tr>
  <tr>
        <td>去向</td>
        <td><?php echo $task['whereabouts']?></td>
      </tr>
      <tr>
        <td>变更原因</td>
        <td><?php echo $task['body']?></td>
      </tr>
      <tr>
        <td>处理情况</td>
        <td><?php echo $task['taskstatus']?></td>
      </tr>
      <tr>
        <td>初审情况</td>
        <td><?php echo $task['trailstatus']?></td>
      </tr>
  <?php if($task['trail']==-1) { ?>
      <tr>
        <td>拒绝原因</td>
        <td><?php echo $task['freason1']?></td>
      </tr>
  <?php } ?>
      <tr>
        <td>终审情况</td>
        <td><?php echo $task['finalstatus']?></td>
      </tr>
  <?php if($task['final']==-1) { ?>
      <tr>
        <td>拒绝原因</td>
        <td><?php echo $task['freason2']?></td>
      </tr>
  <?php } ?>
    </table>
</div>

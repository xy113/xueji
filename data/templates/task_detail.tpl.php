<div class="body">
<h1 class="card-title">ѧ����������</h1>
<div class="blank"></div>
  	<table width="100%" border="0" cellspacing="1" cellpadding="0" class="card" style="width:19cm; margin:0 auto;">
      <tr>
        <td width="70">����</td>
        <td><?php echo $task['name']?></td>
      </tr>
      <tr>
        <td>����ѧУ</td>
        <td><?php echo $task['school']?></td>
      </tr>
  <tr>
    <td>�Ա�</td>
    <td><?php echo $lang['sex'][$task['sex']]?></td>
      </tr>
  <tr>
    <td>ѧ����</td>
    <td><?php echo $task['studentid']?></td>
      </tr>
  <tr>
    <td>���֤��</td>
    <td><?php echo $task['idnumber']?></td>
      </tr>
  <tr>
    <td>�������</td>
    <td><?php echo $task['tasktype']?></td>
      </tr>
  <tr>
        <td>�ύʱ��</td>
        <td><?php echo $task['dateline']?></td>
      </tr>
  <tr>
    <td>���ʱ��</td>
    <td><?php echo $task['changetime']?></td>
      </tr>
  <tr>
        <td>������</td>
        <td><?php echo $task['manager']?></td>
      </tr>
  <tr>
        <td>ȥ��</td>
        <td><?php echo $task['whereabouts']?></td>
      </tr>
      <tr>
        <td>���ԭ��</td>
        <td><?php echo $task['body']?></td>
      </tr>
      <tr>
        <td>�������</td>
        <td><?php echo $task['taskstatus']?></td>
      </tr>
      <tr>
        <td>�������</td>
        <td><?php echo $task['trailstatus']?></td>
      </tr>
  <?php if($task['trail']==-1) { ?>
      <tr>
        <td>�ܾ�ԭ��</td>
        <td><?php echo $task['freason1']?></td>
      </tr>
  <?php } ?>
      <tr>
        <td>�������</td>
        <td><?php echo $task['finalstatus']?></td>
      </tr>
  <?php if($task['final']==-1) { ?>
      <tr>
        <td>�ܾ�ԭ��</td>
        <td><?php echo $task['freason2']?></td>
      </tr>
  <?php } ?>
    </table>
</div>

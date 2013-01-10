
<div class="page-header">
  <h1>Installed modules <small>Results from installing modules</small></h1>
</div>
<table class="table">
<thead>
  <tr><th>Module</th><th>Result</th></tr>
</thead>
<tbody>
<?php foreach($modules as $module): ?>
  <tr><td><?=$module['name']?></td>
  <td><div class='alert alert-success'><?=$module['result'][1]?></div></td></tr>
<?php endforeach; ?>
</tbody>
</table>
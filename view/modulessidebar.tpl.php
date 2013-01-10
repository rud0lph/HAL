<div class="well">
<div>
<h4>All modules</h4>
<p>All Hal modules.</p>
<ul>
<?php foreach($modules as $module): ?>
  <li><?=$module['name']?></li>
<?php endforeach; ?>
</ul>
</div>


<div>
<h4>Hal core</h4>
<p>Hal core modules.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isHalCore']): ?>
  <li><?=$module['name']?></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>


<div>
<h4>Hal CMF</h4>
<p>Hal Content Management Framework (CMF) modules.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isHalCMF']): ?>
  <li><?=$module['name']?></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>


<div>
<h4>Models</h4>
<p>A class is considered a model if its name ends with Model.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isModel']): ?>
  <li><?=$module['name']?></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>


<div>
<h4>Controllers</h4>
<p>Implements interface <code>IController</code>.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isController']): ?>
  <li><?=$module['name']?></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>


<div>
<h4>Manageable module</h4>
<p>Implements interface <code>IModule</code>.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['isManageable']): ?>
  <li><?=$module['name']?></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>


<div>
<h4>Contains SQL</h4>
<p>Implements interface <code>IHasSQL</code>.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if($module['hasSQL']): ?>
  <li><?=$module['name']?></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>


<div>
<h4>More modules</h4>
<p>Modules that does not implement any specific Hal interface.</p>
<ul>
<?php foreach($modules as $module): ?>
  <?php if(!($module['isController'] || $module['isHalCore'] || $module['isHalCMF'])): ?>
  <li><?=$module['name']?></li>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
</div>
</div>
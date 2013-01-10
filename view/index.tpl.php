<div class="page-header">
  <h1>Index Controller <small>Welcome to Hal index controller</small></h1>
</div>

<h2>Download</h2>
<p>You can download Hal from github.</p>
<blockquote>
<code>git clone git://github.com/tinalogan/HAL.git</code>
</blockquote>
<p>You can review its source directly on github: <a href='https://github.com/tinalogan/HAL'>https://github.com/tinalogan/HAL</a></p>

<h2>Installation</h2>
<p>First you have to make the data-directory writable. This is the place where Hal needs
to be able to write and create files.</p>
<blockquote>
<code>cd hal; chmod 777 application/data</code>
</blockquote>

<p>Second, Hal has some modules that need to be initialised. You can do this through a 
controller. Point your browser to the following link.</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>

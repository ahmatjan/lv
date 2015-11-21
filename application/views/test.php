<!--
<div class="selectList"> 
<select class="province"> 
<option>请选择</option> 
</select> 
<select class="city"> 
<option>请选择</option> 
</select> 
<select class="district"> 
<option>请选择</option> 
</select> 
</div>
<script src="<?php echo base_url('public/js/loading/linkage.js')?>" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href ="<?php echo base_url('public/css/loading/css_sans_1.0.0.css')?>" />
-->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>旅行兔</title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="<?php echo base_url('public/modules/ratchet/css/ratchet.css')?>" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="<?php echo base_url('public/modules/ratchet/js/ratchet.js')?>"></script>
    <script src="<?php echo base_url('public/modules/ratchet/js/push.js')?>"></script>
  </head>
  <body>

   <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Ratchet</h1>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
      <p class="content-padded">Thanks for downloading Ratchet. This is an example HTML page that's linked up to compiled Ratchet CSS and JS, has the proper meta tags and the HTML structure. Need some more help before you start filling this with your own content? Check out some Ratchet resources:</p>
      <div class="card">
        <ul class="table-view">
          <li class="table-view-cell">
            <a class="push-right" href="http://goratchet.com">
              <strong>Ratchet documentation</strong>
            </a>
          </li>
          <li class="table-view-cell">
            <a class="push-right" href="https://github.com/twbs/ratchet/">
              <strong>Ratchet on Github</strong>
            </a>
          </li>
          <li class="table-view-cell">
            <a class="push-right" href="https://groups.google.com/forum/#!forum/goratchet">
              <strong>Ratchet Google group</strong>
            </a>
          </li>
          <li class="table-view-cell">
            <a class="push-right" href="https://twitter.com/goratchet">
              <strong>Ratchet on Twitter</strong>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a class="MenuBarItemSubmenu" href="#">Elément 1</a>
    <ul>
      <li><a href="#" class="MenuBarItemSubmenu">Elément 1.1</a>
        <ul>
          <li><a href="#">Elément sans titre</a></li>
          <li><a href="#">Elément sans titre</a></li>
          <li><a href="#">Elément sans titre</a></li>
        </ul>
      </li>
      <li><a href="#">Elément 1.2</a></li>
      <li><a href="#">Elément 1.3</a></li>
    </ul>
  </li>
<li><a class="MenuBarItemSubmenu" href="#">Elément 2</a>
    <ul>
      <li><a class="MenuBarItemSubmenu" href="#">Elément 2.1</a>
        <ul>
          <li><a href="#">Elément 2.1.1</a></li>
          <li><a href="#">Elément 2.1.2</a></li>
        </ul>
      </li>
      <li><a href="#">Elément 2.2</a></li>
      <li><a href="#">Elément 2.3</a></li>
    </ul>
  </li>
</ul>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
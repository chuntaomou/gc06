<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Dropdown Example</h2>
  <p>The data-toggle="dropdown" attribute is used to open the dropdown menu.</p>

  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Dropdown Example
    </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" id="menu2">
      <li role="presentation"><a role="menuitem" tabindex="-1" id="a">show only to me</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" id="b">friends can see</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" id="c">friends of friends also can see</a></li>
    </ul>
  </div>
</div>

</body>

<script>
$("a").click(function(){
$("#menu1").text($(this).text());
});
</script>
</html>

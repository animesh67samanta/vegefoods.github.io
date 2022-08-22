<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input name="quantity" type="number" min="1" max="20" value="1" id="quantityfield" onchange="updateQuantity();">
<p id="totalfield"></p>

<script type="text/javascript">
function updateQuantity() {
    var quantity = document.getElementById("quantityfield").value;
    var price = 5;
    document.getElementById("totalfield").innerHTML = quantity * price;
}
</script>
</script>
</body>
</html>







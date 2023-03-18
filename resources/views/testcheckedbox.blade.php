<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>prop demo</title>
  <style>
  p {
    margin: 20px 0 0;
  }
  b {
    color: blue;
  }
  </style>
  <script>
    function yesnoCheck(that) {
    if (that.value == "other") {
  alert("check");
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}

  </script>
</head>
<body>
 
  <select onchange="yesnoCheck(this);">
    <option value="">Valitse automerkkisi</option>
    <option value="lada">Lada</option>
    <option value="mosse">Mosse</option>
    <option value="volga">Volga</option>
    <option value="vartburg">Vartburg</option>
    <option value="other">Muu</option>
</select>

<div id="ifYes" style="display: none;">
    <label for="car">Muu, mikä?</label> <input type="text" id="car" name="car" /><br />
</div>
 
</body>
</html>
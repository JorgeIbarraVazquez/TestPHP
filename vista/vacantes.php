<?php
require_once("layouts/header.php");
?>

<div  class="row">

    <div class="col-md-6" id="vacantes" style="height:500px;overflow-x: hidden;overflow-y: scroll;">
        <?php echo $info; ?>
    </div>
    
    <div class="col-md-6">
        <div class="spinner"  id="spinner"  style="display:none;">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
        </div>
        <div id="detelle">
        </div>
    </div>
</div>
<script>
function getDetalle(referencenumber){
    const url = 'http://localhost:8080/vacantes/index.php?ref='+referencenumber;
    document.getElementById("detelle").innerHTML ='';
    document.getElementById("spinner").style.display = "block";
    fetch(url)
            .then(res => res.ok ? res.json() : Promise.reject(res))
            .then(data => {
                document.getElementById("spinner").style.display = "none";
                document.getElementById("detelle").innerHTML =data;
            })
            .catch(error => {
                console.log(error);
            });
}

</script>
<?php
require_once("layouts/footer.php");
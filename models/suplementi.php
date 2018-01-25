<?php 
$kategorija=isset($_GET['cid'])&& is_numeric($_GET['cid'])?($_GET['cid']):0;
$q = mysqli_query($conn,"SELECT * FROM suplementi WHERE kategorija=$kategorija AND obrisano=0");
 while($rw=mysqli_fetch_object($q)){ 
 ?>
<div class="col-md-4 col-sm-6 hero-feature">
    <div class="thumbnail"  style="border-radius: 20px; box-shadow: 10px 10px 5px #888;">
        <img src="images/Suplementi/<?php echo $rw->slika;?>" alt="" style="
    height: 202px;">
            <div class="caption"  style="border-radius: 15px;">
                <h5><?php echo $rw->naslov;?></h5>
                <p><?php echo $rw->cena;?> <b>&nbspRSD</b></p>
                <p >
                    <a href="models/buy.php?cid=<?php echo $rw->id;?>" class="btn btn-primary center-block">Add to cart</a>
                </p>
            </div>
    </div>
</div>
<?php 
}
 ?>
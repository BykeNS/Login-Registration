<?php if (isset($_SESSION['success'])): ?>                     
            <div class= "alert alert-success" style="text-align:center;"><?=$_SESSION['success'];
                        unset($_SESSION['success']);?>
            </div>
       <?php endif?>
    

<?php if (isset($_SESSION['danger'])): ?>                     
            <div class= "alert alert-danger" style="text-align:center;"><?=$_SESSION['danger'];
                        unset($_SESSION['danger']);?>
            </div>
       <?php endif?>
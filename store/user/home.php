<?php
include "header.php";


?>

<div id="page-right-content">
    <?php
    if(isset($_GET["pages"])){
        $pages=$_GET["pages"];
        $pages1=$pages.".php";
        if(file_exists($pages1)){
            include $pages1;
        }else{
            echo'Page not FUND';
        }
    }
    
    ?>
</div>
<!-- js placed at the end of the document so the pages load faster -->
        <script src="../admin/assets/js/jquery-2.1.4.min.js"></script>
        <script src="../admin/assets/js/bootstrap.min.js"></script>
        <script src="../admin/assets/js/metisMenu.min.js"></script>
        <script src="../admin/assets/js/jquery.slimscroll.min.js"></script>

        <!-- Datatable js -->
        <script src="../admin/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../admin/assets/plugins/datatables/dataTables.bootstrap.js"></script>
        <script src="../admin/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../admin/assets/plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="../admin/assets/plugins/datatables/jszip.min.js"></script>
        <script src="../admin/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="../admin/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="../admin/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="../admin/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="../admin/assets/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../admin/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../admin/assets/plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="../admin/assets/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="../admin/assets/plugins/datatables/dataTables.colVis.js"></script>
        <script src="../admin/assets/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <!-- init -->
        <script src="../admin/assets/pages/jquery.datatables.init.js"></script>

        <!-- App Js -->
        <script src="../admin/assets/js/jquery.app.js"></script>
    

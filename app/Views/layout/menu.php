<li class="menu-title">Main</li>

<li>
    <a href="home" class="waves-effect">
        <i class="mdi mdi-airplay"></i>
        <span> Dashboard </span>
    </a>
</li>

<?php
$session = \Config\Services::session();
if ($session->levelid == 1) :
?>
    <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-edit"></i> <span> Forms </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="admin">Form Admin</a></li>
        <li><a href="kepalaops">Form Kepala Operasional</a></li>
        <li><a href="marketing">Form Marketing Retail</a></li>
        <li><a href="marketingproject">Form Marketing Project</a></li>
        <li><a href="monitoringcs">Form Monitoring & CS</a></li>
        <li><a href="staffops">Form Staff Operasional</a></li>  
    </ul>
</li>

<?php endif; ?>

<?php
$session = \Config\Services::session();
if ($session->levelid == 2) :
?>
    <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-edit"></i> <span> Forms </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <!-- <li><a href="admin">Form Admin</a></li>
        <li><a href="kepalaops">Form Kepala Operasional</a></li> -->
        <li><a href="marketing">Form Marketing Retail</a></li>
        <li><a href="marketingproject">Form Marketing Project</a></li>
        <!-- <li><a href="monitoringcs">Form Monitoring & CS</a></li>
        <li><a href="staffops">Form Staff Operasional</a></li>   -->
    </ul>
</li>

<?php endif; ?>

<?php
$session = \Config\Services::session();
if ($session->levelid == 3) :
?>
    <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-edit"></i> <span> Forms </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <!-- <li><a href="admin">Form Admin</a></li>
        <li><a href="kepalaops">Form Kepala Operasional</a></li> -->
        <!-- <li><a href="marketing">Form Marketing Retail</a></li>
        <li><a href="marketingproject">Form Marketing Project</a></li>
        <li><a href="monitoringcs">Form Monitoring & CS</a></li> -->
        <li><a href="staffops">Form Staff Operasional</a></li>  
    </ul>
</li>

<?php endif; ?>

<?php
$session = \Config\Services::session();
if ($session->levelid == 4) :
?>
    <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-edit"></i> <span> Forms </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <!-- <li><a href="admin">Form Admin</a></li> -->
        <li><a href="kepalaops">Form Kepala Operasional</a></li> -->
        <!-- <li><a href="marketing">Form Marketing Retail</a></li>
        <li><a href="marketingproject">Form Marketing Project</a></li>
        <li><a href="monitoringcs">Form Monitoring & CS</a></li>
        <li><a href="staffops">Form Staff Operasional</a></li>   -->
    </ul>
</li>

<?php endif; ?>

<?php
$session = \Config\Services::session();
if ($session->levelid == 5) :
?>
    <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-edit"></i> <span> Forms </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <!-- <li><a href="admin">Form Admin</a></li>
        <li><a href="kepalaops">Form Kepala Operasional</a></li>
        <li><a href="marketing">Form Marketing Retail</a></li>
        <li><a href="marketingproject">Form Marketing Project</a></li> -->
        <li><a href="monitoringcs">Form Monitoring & CS</a></li>
        <!-- <li><a href="staffops">Form Staff Operasional</a></li>   -->
    </ul>
</li>

<?php endif; ?>

<?php
$session = \Config\Services::session();
if ($session->levelid == 6) :
?>
    <li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-table-edit"></i> <span> Forms </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="admin">Form Admin</a></li>
        <!-- <li><a href="kepalaops">Form Kepala Operasional</a></li>
        <li><a href="marketing">Form Marketing Retail</a></li>
        <li><a href="marketingproject">Form Marketing Project</a></li> -->
        <!-- <li><a href="monitoringcs">Form Monitoring & CS</a></li> -->
        <!-- <li><a href="staffops">Form Staff Operasional</a></li>   -->
    </ul>
</li>

<?php endif; ?>

<li class="menu-title">Master Data</li>
<li class="has_sub">
    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-file"></i> <span> Data </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
    <ul class="list-unstyled">
        <li><a href="customer">Data Customer</a></li>
        <li><a href="vendors">Data Vendor</a></li>
    </ul>
</li>
<?php
$session = \Config\Services::session();
if ($session->levelid == 1) :
?>
<li>
    <a href="laporan" class="waves-effect">
        <i class="mdi mdi-file-document"></i>
        <span> Laporan </span>
    </a>
</li>
<li>
    <a href="user" class="waves-effect">
        <i class="mdi mdi-account-plus"></i>
        <span> User </span>
    </a>
</li>
<?php endif; ?>

<?php

function cekaksesmarketing()
{
    $session = \Config\Services::session();
    if ($session->get('levelid') == 2) {
        return true;
    } else {
        return redirect()->to('login');
    }
}
function cekakseskepalaops()
{
    $session = \Config\Services::session();
    if ($session->get('levelid') == 3) {
        return true;
    } else {
        return redirect()->to('login');
    }
}
function cekaksesstaffops()
{
    $session = \Config\Services::session();
    if ($session->get('levelid') == 4) {
        return true;
    } else {
        return redirect()->to('login');
    }
}
function cekaksesmonitoringcs()
{
    $session = \Config\Services::session();
    if ($session->get('levelid') == 5) {
        return true;
    } else {
        return redirect()->to('login');
    }
}
function cekaksesadmin()
{
    $session = \Config\Services::session();
    if ($session->get('levelid') == 6) {
        return true;
    } else {
        return redirect()->to('login');
    }
}
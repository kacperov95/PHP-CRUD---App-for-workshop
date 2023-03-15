<?php
function connectOracle()
{

    $dbstr ="(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)
        (HOST=dbserver.mif.pg.gda.pl)(PORT = 1521))
        (CONNECT_DATA = (SERVER=DEDICATED)
        (SERVICE_NAME = ORACLEMIF)
        ))"; 

        $charenc = 'AL32UTF8';

        $conn = oci_connect('KACPER_P','Fn79Z',$dbstr, $charenc);

        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['Błąd łączenia z bazą danych'], ENT_QUOTES), E_USER_ERROR);
        }
    return $conn;
}
?>
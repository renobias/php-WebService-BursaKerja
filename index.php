<?php
require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/login','login'); /* User login */
$app->post('/signuppencarikerja','signuppencarikerja'); /* User Signup  */
$app->get('/getFeed','getFeed'); /* User Feeds  */
$app->post('/feed','feed'); /* User Feeds  */
$app->post('/feedLoker','feedLoker'); /* User Feeds  */
$app->post('/feedUname','feedUname'); /* User Feeds  */
$app->post('/feedUpdate','feedUpdate'); /* User Feeds  */
$app->post('/feedDelete','feedDelete'); /* User Feeds  */
$app->post('/getImages', 'getImages');
$app->post('/aftersignupPK','aftersignupPK');
$app->post('/feedPK','feedPK');
$app->post('/profileUserPK','profileUserPK');
$app->post('/editstatusPK','editstatusPK');
$app->post('/profileDetailPK','profileDetailPK');
$app->post('/editbiodataPK','editbiodataPK');
$app->post('/editkontakPK','editkontakPK');
$app->post('/editintroPK','editintroPK');
$app->post('/signupperusahaan','signupperusahaan');
$app->post('/aftersignupPerusahaan','aftersignupPerusahaan');
$app->post('/profilePerusahaan','profilePerusahaan');
$app->post('/profileDetailPKHire','profileDetailPKHire');
$app->post('/profileUserPKHire','profileUserPKHire');
$app->post('/notifikasi','notifikasi');
$app->post('/tampilnotifikasi','tampilnotifikasi');
$app->post('/ambilnilainotifikasi','ambilnilainotifikasi');
$app->post('/emptynotifikasi','emptynotifikasi');
$app->post('/pesannotifikasiPK','pesannotifikasiPK');
$app->post('/daftarPenawaran','daftarPenawaran');
$app->post('/berhentiPenawaran','berhentiPenawaran');
$app->post('/getBidangPekerjaan','getBidangPekerjaan');
$app->post('/getBidangKeahlian','getBidangKeahlian');
$app->post('/getProgramStudi','getProgramStudi');
$app->post('/simpanBidangKeahlianSatu','simpanBidangKeahlianSatu');
$app->post('/simpanBidangKeahlianDua','simpanBidangKeahlianDua');
$app->post('/simpanBidangKeahlianTiga','simpanBidangKeahlianTiga');
$app->post('/getKeahlianUtama','getKeahlianUtama');
$app->post('/getKeahlianKedua','getKeahlianKedua');
$app->post('/getKeahlianKetiga','getKeahlianKetiga');
$app->post('/getKeahlianUtamaAll','getKeahlianUtamaAll');
$app->post('/searchfeedPK','searchfeedPK');
$app->post('/feedfilterPK','feedfilterPK');
$app->post('/feedPKinfinite','feedPKinfinite');

$app->run();

function getKeahlianUtamaAll(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
   
    try {
         
            $keahlianUtamaData = '';
            $db = getDB();
                $sql = "SELECT user_id_fk,id_bidang_pekerjaan_fk_1,bidang_pekerjaan,id_bidang_keahlian_fk_1,bidang_keahlian from detail_kerja inner join bidang_pekerjaan on detail_kerja.id_bidang_pekerjaan_fk_1= bidang_pekerjaan.id_bidang_pekerjaan inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_1=bidang_keahlian.id_bidang_keahlian";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $keahlianUtamaData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($keahlianUtamaData)
            echo '{"keahlianUtamaData": ' . json_encode($keahlianUtamaData) . '}';
            else
            echo '{"keahlianUtamaData": ""}';
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function getKeahlianUtama(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
   
    try {
         
            $keahlianUtamaData = '';
            $db = getDB();
                $sql = "SELECT user_id_fk,id_bidang_pekerjaan_fk_1,bidang_pekerjaan,id_bidang_keahlian_fk_1,bidang_keahlian from detail_kerja inner join bidang_pekerjaan on detail_kerja.id_bidang_pekerjaan_fk_1= bidang_pekerjaan.id_bidang_pekerjaan inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_1=bidang_keahlian.id_bidang_keahlian where user_id_fk =:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $keahlianUtamaData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($keahlianUtamaData)
            echo '{"keahlianUtamaData": ' . json_encode($keahlianUtamaData) . '}';
            else
            echo '{"keahlianUtamaData": ""}';
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function getKeahlianKedua(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
   
    try {
         
            $keahlianKeduaData = '';
            $db = getDB();
                $sql = "SELECT user_id_fk,id_bidang_pekerjaan_fk_2,bidang_pekerjaan,id_bidang_keahlian_fk_2,bidang_keahlian from detail_kerja inner join bidang_pekerjaan on detail_kerja.id_bidang_pekerjaan_fk_2= bidang_pekerjaan.id_bidang_pekerjaan inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_2=bidang_keahlian.id_bidang_keahlian where user_id_fk =:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $keahlianKeduaData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($keahlianKeduaData)
            echo '{"keahlianKeduaData": ' . json_encode($keahlianKeduaData) . '}';
            else
            echo '{"keahlianKeduaData": ""}';
 
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function getKeahlianKetiga(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;

   
    try {
            $keahlianKetigaData = '';
            $db = getDB();
                $sql = "SELECT user_id_fk,id_bidang_pekerjaan_fk_3,bidang_pekerjaan,id_bidang_keahlian_fk_3,bidang_keahlian from detail_kerja inner join bidang_pekerjaan on detail_kerja.id_bidang_pekerjaan_fk_3= bidang_pekerjaan.id_bidang_pekerjaan inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_3=bidang_keahlian.id_bidang_keahlian where user_id_fk =:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $keahlianKetigaData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($keahlianKetigaData)
            echo '{"keahlianKetigaData": ' . json_encode($keahlianKetigaData) . '}';
            else
            echo '{"keahlianKetigaData": ""}';
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function simpanBidangKeahlianSatu(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $id_Bidang_Pekerjaan = $data->idBidangPekerjaan;
    $id_Bidang_Keahlian = $data->idBidangKeahlian;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $db = getDB();
                $sql = "UPDATE detail_kerja set id_bidang_pekerjaan_fk_1 =:id_Bidang_Pekerjaan, id_bidang_keahlian_fk_1=:id_Bidang_Keahlian where user_id_fk =:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("id_Bidang_Pekerjaan", $id_Bidang_Pekerjaan, PDO::PARAM_INT);
                $stmt->bindParam("id_Bidang_Keahlian", $id_Bidang_Keahlian, PDO::PARAM_INT);
            $stmt->execute();
           
            echo '{"success":{"text":"keahlian updated"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function simpanBidangKeahlianDua(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $id_Bidang_Pekerjaan = $data->idBidangPekerjaan;
    $id_Bidang_Keahlian = $data->idBidangKeahlian;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $db = getDB();
                $sql = "UPDATE detail_kerja set id_bidang_pekerjaan_fk_2 =:id_Bidang_Pekerjaan, id_bidang_keahlian_fk_2=:id_Bidang_Keahlian where user_id_fk =:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("id_Bidang_Pekerjaan", $id_Bidang_Pekerjaan, PDO::PARAM_INT);
                $stmt->bindParam("id_Bidang_Keahlian", $id_Bidang_Keahlian, PDO::PARAM_INT);
            $stmt->execute();
           
            echo '{"success":{"text":"keahlian updated"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function simpanBidangKeahlianTiga(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $id_Bidang_Pekerjaan = $data->idBidangPekerjaan;
    $id_Bidang_Keahlian = $data->idBidangKeahlian;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $db = getDB();
                $sql = "UPDATE detail_kerja set id_bidang_pekerjaan_fk_3 =:id_Bidang_Pekerjaan, id_bidang_keahlian_fk_3=:id_Bidang_Keahlian where user_id_fk =:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("id_Bidang_Pekerjaan", $id_Bidang_Pekerjaan, PDO::PARAM_INT);
                $stmt->bindParam("id_Bidang_Keahlian", $id_Bidang_Keahlian, PDO::PARAM_INT);
            $stmt->execute();
           
            echo '{"success":{"text":"keahlian updated"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function getProgramStudi(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);

    if($systemToken == $token){
        $ProgramStudiData = '';
        $db = getDB();

            $sql = "SELECT * from program_studi";
            $stmt = $db->prepare($sql);

        $stmt->execute();
        $ProgramStudiData = $stmt->fetchAll(PDO::FETCH_OBJ);
       
        $db = null;

        if($ProgramStudiData)
        echo '{"ProgramStudiData": ' . json_encode($ProgramStudiData) . '}';
        else
        echo '{"ProgramStudiData": ""}';
    } else{
        echo '{"error":{"text":"No access"}}';
    }
}

function getBidangKeahlian(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $id_bidang_pekerjaan=$data->id_bidang_pekerjaan;
    $systemToken=apiToken($user_id);
  
    if($systemToken == $token){
        $BidangKeahlianData = '';
        $db = getDB();

            $sql = "SELECT*from bidang_keahlian inner join bidang_pekerjaan on bidang_pekerjaan.id_bidang_pekerjaan=bidang_keahlian.id_bidang_pekerjaan_fk and bidang_keahlian.id_bidang_pekerjaan_fk=:id_bidang_pekerjaan";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("id_bidang_pekerjaan", $id_bidang_pekerjaan, PDO::PARAM_INT);

        $stmt->execute();
        $BidangKeahlianData = $stmt->fetchAll(PDO::FETCH_OBJ);
       
        $db = null;

        if($BidangKeahlianData)
        echo '{"BidangKeahlianData": ' . json_encode($BidangKeahlianData) . '}';
        else
        echo '{"BidangKeahlianData": ""}';
    } else{
        echo '{"error":{"text":"No access"}}';
    }
}

function getBidangPekerjaan(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);

    if($systemToken == $token){
        $BidangPekerjaanDataData = '';
        $db = getDB();

            $sql = "SELECT * from bidang_pekerjaan";
            $stmt = $db->prepare($sql);

        $stmt->execute();
        $BidangPekerjaanData = $stmt->fetchAll(PDO::FETCH_OBJ);
       
        $db = null;

        if($BidangPekerjaanData)
        echo '{"BidangPekerjaanData": ' . json_encode($BidangPekerjaanData) . '}';
        else
        echo '{"BidangPekerjaanData": ""}';
    } else{
        echo '{"error":{"text":"No access"}}';
    }
}

/************************* BERHENTI PENAWARAN *************************************/
function berhentiPenawaran(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $id_penawaran = $data->id_penawaran;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $db = getDB();
                $sql = "DELETE from daftar_penawaran where id_penawaran=:id_penawaran";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("id_penawaran", $id_penawaran, PDO::PARAM_INT);
            $stmt->execute();
           
            echo '{"success":{"text":"pencari kerja deleted"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 
}

/************************* DAFTAR PENAWARAN *************************************/
function daftarPenawaran(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $profileUserData = '';
            $db = getDB();
                $sql = "SELECT id_penawaran,id_perusahaan_fk,profile_perusahaan.nama_perusahaan,id_pencarikerja_fk,nama_lengkap,bidang_pekerjaan,bidang_keahlian,foto_profil from daftar_penawaran 
                inner join profile_pencari_kerja on daftar_penawaran.id_pencarikerja_fk=profile_pencari_kerja.user_id_fk 
                inner join profile_perusahaan on daftar_penawaran.id_perusahaan_fk=profile_perusahaan.userID_fk 
                inner join detail_kerja
                inner join bidang_pekerjaan on detail_kerja.id_bidang_pekerjaan_fk_1=bidang_pekerjaan.id_bidang_pekerjaan
                inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_1=bidang_keahlian.id_bidang_keahlian and detail_kerja.user_id_fk=profile_pencari_kerja.user_id_fk
                and id_perusahaan_fk=:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $profileUserData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($profileUserData)
            echo '{"profileUserData": ' . json_encode($profileUserData) . '}';
            else
            echo '{"profileUserData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* TAMPIL PESAN NOTIFIKASI *************************************/
function pesannotifikasiPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $profileUserData = '';
            $db = getDB();
                $sql = "SELECT id_pencarikerja_fk,nama_lengkap,id_perusahaan_fk,nama_perusahaan,created from interest inner join profile_pencari_kerja on interest.id_pencarikerja_fk=profile_pencari_kerja.user_id_fk inner join profile_perusahaan on interest.id_perusahaan_fk=profile_perusahaan.userID_fk and id_pencarikerja_fk=:user_id order by created desc";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();

            $profileUserData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($profileUserData)
            echo '{"profileUserData": ' . json_encode($profileUserData) . '}';
            else
            echo '{"profileUserData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}
/************************* AMBIL NILAI NOTIFIKASI *************************************/
function ambilnilainotifikasi(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
   
    try {
            $profileUserData = '';
            $db = getDB();
                $sql = "SELECT countbadgenotif from notification,user where user_id_fk=:user_id and user_id_fk=user_id ";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $profileUserData= $row['countbadgenotif'];
           
            $db = null;
            echo json_encode($profileUserData);

       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* TAMPIL NOTIFIKASI *************************************/
function tampilnotifikasi(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $profileUserData = '';
            $db = getDB();
                $sql = "SELECT countbadgenotif from notification,user where user_id_fk=:user_id and user_id_fk=user_id ";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $profileUserData= $row['countbadgenotif'];
           
            $db = null;

            if($profileUserData)
            echo json_encode($profileUserData);
            else
            echo 'null';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* NOTIFIKASI *************************************/
function notifikasi(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $user_id_fk=$data->user_id_fk;
    $count_badge_notif=$data->count_badge_notif;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $notifData = '';
            $db = getDB();
            $sql = "UPDATE notification set countbadgenotif=:count_badge_notif where user_id_fk=:user_id_fk";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id_fk", $user_id_fk, PDO::PARAM_INT);
            $stmt->bindParam("count_badge_notif", $count_badge_notif, PDO::PARAM_INT);
            $stmt->execute();

            $sql2 = "insert into interest(id_perusahaan_fk,id_pencarikerja_fk,created) values(:user_id,:user_id_fk,:created)";
            $stmt2 = $db->prepare($sql2);
            $stmt2->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt2->bindParam("user_id_fk", $user_id_fk, PDO::PARAM_INT);
            $created = time();
            $stmt2->bindParam("created", $created, PDO::PARAM_INT);
            $stmt2->execute();

            $sql3 = "insert into daftar_penawaran(id_perusahaan_fk,id_pencarikerja_fk) values(:user_id,:user_id_fk)";
            $stmt3 = $db->prepare($sql3);
            $stmt3->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt3->bindParam("user_id_fk", $user_id_fk, PDO::PARAM_INT);
            $stmt3->execute();

            $sql4 = "UPDATE detail_kerja set status_kerja = 3 where user_id_fk=:user_id_fk";
            $stmt4 = $db->prepare($sql4);
            $stmt4->bindParam("user_id_fk", $user_id_fk, PDO::PARAM_INT);
            $stmt4->execute();

            $sql1 = "SELECT user_id_fk,countbadgenotif from notification,user where user_id_fk=:user_id_fk and user_id_fk=user_id";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id_fk", $user_id_fk, PDO::PARAM_INT);
            $stmt1->execute();
            $notifData = $stmt1->fetch(PDO::FETCH_OBJ);
            $db = null;
            echo '{"notifData": ' . json_encode($notifData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* EMPTY *************************************/
function emptynotifikasi(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $count_badge_notif=$data->count_badge_notif;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
        if($systemToken == $token){
            $notifData = '';
            $db = getDB();
            $sql = "UPDATE notification set countbadgenotif=:count_badge_notif where user_id_fk=:user_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("count_badge_notif", $count_badge_notif, PDO::PARAM_INT);
            $stmt->execute();

            $sql1 = "SELECT user_id_fk,countbadgenotif from notification,user where user_id_fk=:user_id and user_id_fk=user_id";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $notifData = $stmt1->fetch(PDO::FETCH_OBJ);


            $db = null;
            echo '{"notifData": ' . json_encode($notifData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* AFTER SIGN UP PERUSAHAAN *************************************/
function aftersignupPerusahaan(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $namaPerusahaan=$data->namaPerusahaan;
    $bidangPerusahaan=$data->bidangPerusahaan;
    $alamatPerusahaan=$data->alamatPerusahaan;
    $kodeposPerusahaan=$data->kodeposPerusahaan;
    $notelpPerusahaan=$data->notelpPerusahaan;
    $emailPerusahaan=$data->emailPerusahaan;
    $deskripsiPerusahaan=$data->deskripsiPerusahaan;
    $systemToken=apiToken($user_id);
    
    try {
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $emailPerusahaan);
            if($systemToken == $token){
                if (strlen(trim($emailPerusahaan))>0 && $email_check>0){
                $profileData = '';
                $db = getDB();
                $sql = "insert into profile_perusahaan(userID_fk,nama_perusahaan,bidang_perusahaan,alamat,kodepos,no_telepon,deskripsi,email) values (:user_id,:namaPerusahaan,:bidangPerusahaan,:alamatPerusahaan,:kodeposPerusahaan,:notelpPerusahaan,:deskripsiPerusahaan,:emailPerusahaan)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("namaPerusahaan", $namaPerusahaan, PDO::PARAM_STR);
                $stmt->bindParam("bidangPerusahaan",$bidangPerusahaan,PDO::PARAM_STR);
                $stmt->bindParam("alamatPerusahaan", $alamatPerusahaan, PDO::PARAM_STR);
                $stmt->bindParam("kodeposPerusahaan", $kodeposPerusahaan, PDO::PARAM_INT);
                $stmt->bindParam("notelpPerusahaan",$notelpPerusahaan,PDO::PARAM_INT);
                $stmt->bindParam("emailPerusahaan", $emailPerusahaan, PDO::PARAM_STR);
                $stmt->bindParam("deskripsiPerusahaan", $deskripsiPerusahaan, PDO::PARAM_STR);
                $stmt->execute();

                $sql1 = "SELECT userID_fk,nama_perusahaan,bidang_perusahaan,alamat,kodepos,no_telepon,deskripsi,profile_perusahaan.email FROM profile_perusahaan,user WHERE userID_fk=:user_id and userID_fk=user_id";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt1->execute();
                $profileData = $stmt1->fetch(PDO::FETCH_OBJ);


                $db = null;
                echo '{"profileData": ' . json_encode($profileData) . '}';
            }else{
                echo '{"error":{"text":"Enter valid data"}}';
            }
     } else{
        echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* EDIT INTRO PK *************************************/
function editintroPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $ttg_saya=$data->ttg_saya;
    $avatar=$data->avatar;
    $poto_profil=$data->poto_profil;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $db = getDB();
            $sql = "UPDATE profile_pencari_kerja set ttg_saya=:ttg_saya,foto_profil=:poto_profil where user_id_fk=:user_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("ttg_saya", $ttg_saya, PDO::PARAM_STR);
            $stmt->bindParam("poto_profil", $poto_profil, PDO::PARAM_STR);
            $stmt->execute();

            $sql1 = "SELECT nama_lengkap,ttg_saya from profile_pencari_kerja where user_id_fk=:user_id";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $statusData = $stmt1->fetch(PDO::FETCH_OBJ);

            $db = null;
            echo '{"profileData": ' . json_encode($statusData) . '}';

        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }


}


/************************* EDIT KONTAK PK *************************************/
function editkontakPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $alamat=$data->alamat;
    $kodepos=$data->kodepos;
    $no_telp=$data->no_telp;
    $email=$data->email;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $db = getDB();
            $sql = "UPDATE profile_pencari_kerja,user set alamat=:alamat, kodepos=:kodepos, no_telp=:no_telp,email=:email where user_id_fk=:user_id and user_id=:user_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("alamat", $alamat, PDO::PARAM_STR);
            $stmt->bindParam("kodepos", $kodepos, PDO::PARAM_STR);
            $stmt->bindParam("no_telp",$no_telp,PDO::PARAM_STR);
            $stmt->bindParam("email",$email,PDO::PARAM_STR);
            $stmt->execute();

            $sql1 = "SELECT * from profile_pencari_kerja where user_id_fk=:user_id";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $statusData = $stmt1->fetch(PDO::FETCH_OBJ);

            $db = null;
            echo '{"profileData": ' . json_encode($statusData) . '}';

        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* EDIT BIODATA PK *************************************/
function editbiodataPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $nama_lengkap=$data->nama_lengkap;
    $tmpt_lahir=$data->tmpt_lahir;
    $tgl_lahir=$data->tgl_lahir;
    $jenkel=$data->jenkel;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $db = getDB();
            $sql = "UPDATE profile_pencari_kerja set nama_lengkap = :nama_lengkap, tempat_lahir=:tmpt_lahir, tgl_lahir=:tgl_lahir,jenis_kelamin=:jenkel where user_id_fk=:user_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("nama_lengkap", $nama_lengkap, PDO::PARAM_STR);
            $stmt->bindParam("tmpt_lahir", $tmpt_lahir, PDO::PARAM_STR);
            $stmt->bindParam("tgl_lahir",$tgl_lahir,PDO::PARAM_STR);
            $stmt->bindParam("jenkel",$jenkel,PDO::PARAM_INT);
            $stmt->execute();

            $sql1 = "SELECT * from profile_pencari_kerja where user_id_fk=:user_id";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $statusData = $stmt1->fetch(PDO::FETCH_OBJ);

            $db = null;
            echo '{"profileData": ' . json_encode($statusData) . '}';

        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* EDIT STATUS PK *************************************/
function editstatusPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $status=$data->status;
    $status_PK=$data->statusPK;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
         
            
            $profileData = '';
            $db = getDB();
            $sql = "UPDATE detail_kerja set status_kerja = :status,status_pencarian_kerja=:statusPK where user_id_fk=:user_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("status", $status, PDO::PARAM_INT);
            $stmt->bindParam("statusPK",$status_PK,PDO::PARAM_INT);
            $stmt->execute();

            $sql1 = "SELECT * from detail_kerja where user_id_fk=:user_id";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $statusData = $stmt1->fetch(PDO::FETCH_OBJ);


            $db = null;
            echo '{"profileData": ' . json_encode($statusData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* AFTER SIGN UP PK *************************************/
function aftersignupPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $nama_lengkap=$data->namaLengkap;
    $id_prodi_fk=$data->prodi;
    $tahun_lulus=$data->tahunlulus;
    $tahun_masuk=$data->tahunmasuk;
    $jenis_pendaftar=$data->jenis_pendaftar;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
         
            
            $profileData = '';
            $db = getDB();
            $sql = "INSERT INTO profile_pencari_kerja(user_id_fk,nama_lengkap,id_prodi_fk,tahun_lulus,tahun_masuk,jenis_pendaftar) VALUES (:user_id,:nama_lengkap,:id_prodi_fk,:tahun_lulus,:tahun_masuk,:jenis_pendaftar)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("nama_lengkap", $nama_lengkap, PDO::PARAM_STR);
            $stmt->bindParam("id_prodi_fk",$id_prodi_fk,PDO::PARAM_INT);
            $stmt->bindParam("tahun_lulus", $tahun_lulus,PDO::PARAM_STR);
            $stmt->bindParam("tahun_masuk", $tahun_masuk,PDO::PARAM_STR);
            $stmt->bindParam("jenis_pendaftar", $jenis_pendaftar,PDO::PARAM_INT);
            $stmt->execute();
            
            $sql2 = "INSERT INTO detail_kerja(user_id_fk,status_kerja,status_pencarian_kerja) values (:user_id,2,2)";
            $stmt2 = $db->prepare($sql2);
            $stmt2->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt2->execute();

            $sql3 = "insert into notification(user_id_fk,countbadgenotif) values (:user_id,0)";
            $stmt3 = $db->prepare($sql3);
            $stmt3->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt3->execute();

            $sql1 = "SELECT nama_lengkap,prodi,tahun_lulus FROM profile_pencari_kerja,program_studi WHERE user_id_fk=:user_id and id_prodi_fk=id_prodi";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $profileData = $stmt1->fetch(PDO::FETCH_OBJ);


            $db = null;
            echo '{"profileData": ' . json_encode($profileData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/************************* USER LOGIN *************************************/
/* ### User login ### */
function login() {
    
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        
        $db = getDB();
        $userData ='';
        $sql = "SELECT user_id, name, email, username,level FROM user WHERE (username=:username or email=:username) and password=:password ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("username", $data->username, PDO::PARAM_STR);
        $password=hash('sha256',$data->password);
        $stmt->bindParam("password", $password, PDO::PARAM_STR);
        $stmt->execute();
        $mainCount=$stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
            $user_id=$userData->user_id;
            $userData->token = apiToken($user_id);
        }
        
        $db = null;
         if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Bad request wrong username and password"}}';
            }
           
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* ### User registration ### */
function signuppencarikerja(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email=$data->email;
    $name=$data->name;
    $username=$data->username;
    $password=$data->password;
    
    try {
        
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
        if (strlen(trim($username))>0 && strlen(trim($password))>0 && strlen(trim($email))>0 && $email_check>0 && $username_check>0 && $password_check>0)
        {
        
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM user WHERE username=:username or email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("username", $username,PDO::PARAM_STR);
            $stmt->bindParam("email", $email,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                -
                /*Inserting user values*/
                $sql1="INSERT INTO user(username,password,email,name,level)VALUES(:username,:password,:email,:name,2)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("username", $username,PDO::PARAM_STR);
                $password=hash('sha256',$data->password);
                $stmt1->bindParam("password", $password,PDO::PARAM_STR);
                $stmt1->bindParam("email", $email,PDO::PARAM_STR);
                $stmt1->bindParam("name", $name,PDO::PARAM_STR);
                $stmt1->execute();
                
                $userData=internalUserDetails($email);
                
            }
            
            $db = null;
         
            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid data"}}';
            }
           
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/* ### User registration ### */
function signupperusahaan(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email=$data->email;
    $name=$data->name;
    $username=$data->username;
    $password=$data->password;
    
    try {
        
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
        if (strlen(trim($username))>0 && strlen(trim($password))>0 && strlen(trim($email))>0 && $email_check>0 && $username_check>0 && $password_check>0)
        {
        
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM user WHERE username=:username or email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("username", $username,PDO::PARAM_STR);
            $stmt->bindParam("email", $email,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                -
                /*Inserting user values*/
                $sql1="INSERT INTO user(username,password,email,name,level)VALUES(:username,:password,:email,:name,3)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("username", $username,PDO::PARAM_STR);
                $password=hash('sha256',$data->password);
                $stmt1->bindParam("password", $password,PDO::PARAM_STR);
                $stmt1->bindParam("email", $email,PDO::PARAM_STR);
                $stmt1->bindParam("name", $name,PDO::PARAM_STR);
                $stmt1->execute();
                
                $userData=internalUserDetails($email);
                
            }
            
            $db = null;
         

            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid data"}}';
            }

           
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


function email() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $email=$data->email;

    try {
       
        $email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
       
        if (strlen(trim($email))>0 && $email_check>0)
        {
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM emailUsers WHERE email=:email";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("email", $email,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                
                /*Inserting user values*/
                $sql1="INSERT INTO emailUsers(email)VALUES(:email)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("email", $email,PDO::PARAM_STR);
                $stmt1->execute();
                
                
            }
            $userData=internalEmailDetails($email);
            $db = null;
            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid dataaaa"}}';
            }
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/* ### internal Username Details ### */
function internalUserDetails($input) {
    
    try {
        $db = getDB();
        $sql = "SELECT user_id, name, email, username FROM user WHERE username=:input or email=:input";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("input", $input,PDO::PARAM_STR);
        $stmt->execute();
        $usernameDetails = $stmt->fetch(PDO::FETCH_OBJ);
        $usernameDetails->token = apiToken($usernameDetails->user_id);
        $db = null;
        return $usernameDetails;
        
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    
}

function getFeed(){
    try {
         
        if(1){
            $feedData = '';
            $db = getDB();
          
                $sql = "SELECT * FROM feed ORDER BY feed_id DESC LIMIT 15";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
          
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

function feed(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            if($lastCreated){
                $sql = "SELECT * FROM feed WHERE user_id_fk=:user_id AND created < :lastCreated ORDER BY feed_id DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
            }
            else{
                $sql = "SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
            
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

function feedLoker(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            if($lastCreated){
                $sql = "SELECT companyname,judul_loker,deskripsi_loker FROM company_user,company_loker WHERE company_id_fk = 
                company_id AND created < :lastCreated ORDER BY company_loker_id DESC LIMIT 15";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
            }
            else{
                $sql = "SELECT companyname,judul_loker,deskripsi_loker FROM company_user,company_loker WHERE company_id_fk = 
                company_id ORDER BY company_loker_id DESC LIMIT 15";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

function feedPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya,foto_profil from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi ORDER BY user_id_fk DESC";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function feedPKinfinite(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id);
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            if($lastCreated){
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya,foto_profil,created from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi AND created < :lastCreated ORDER BY user_id_fk DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
            }else{
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya,foto_profil,created from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi ORDER BY user_id_fk DESC LIMIT 5";
                $stmt = $db->prepare($sql);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;
            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function feedfilterPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $prodi=$data->prodi;
    $bidang_keahlian=$data->bidang_keahlian;
    $tahun_lulus=$data->tahun_lulus;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            if($prodi&&$bidang_keahlian&&$tahun_lulus){
                $sql = "SELECT profile_pencari_kerja.user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya,id_bidang_keahlian,bidang_keahlian  from profile_pencari_kerja
                inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi
                inner join detail_kerja 
                inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_1=bidang_keahlian.id_bidang_keahlian and detail_kerja.user_id_fk=profile_pencari_kerja.user_id_fk
                where prodi=:prodi and tahun_lulus=:tahun_lulus and bidang_keahlian=:bidang_keahlian
                order by user_id_fk DESC";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("prodi", $prodi, PDO::PARAM_STR);
                $stmt->bindParam("tahun_lulus", $tahun_lulus, PDO::PARAM_STR);
                $stmt->bindParam("bidang_keahlian", $bidang_keahlian, PDO::PARAM_STR);
            }else if($prodi&&$bidang_keahlian){
                $sql = "SELECT profile_pencari_kerja.user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya,id_bidang_keahlian,bidang_keahlian  from profile_pencari_kerja
                inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi
                inner join detail_kerja 
                inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_1=bidang_keahlian.id_bidang_keahlian and detail_kerja.user_id_fk=profile_pencari_kerja.user_id_fk
                where prodi=:prodi and bidang_keahlian=:bidang_keahlian
                order by user_id_fk DESC";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("prodi", $prodi, PDO::PARAM_STR);
                $stmt->bindParam("bidang_keahlian", $bidang_keahlian, PDO::PARAM_STR);
            }else if($prodi&&$tahun_lulus){
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi and prodi=:prodi and tahun_lulus=:tahun_lulus ORDER BY user_id_fk DESC";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("prodi", $prodi, PDO::PARAM_STR);
                $stmt->bindParam("tahun_lulus", $tahun_lulus, PDO::PARAM_STR);
            }else if($prodi){
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi and prodi=:prodi ORDER BY user_id_fk DESC";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("prodi", $prodi, PDO::PARAM_STR);
            }elseif($bidang_keahlian){
                $sql = "SELECT profile_pencari_kerja.user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya,id_bidang_keahlian,bidang_keahlian  from profile_pencari_kerja
                inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi
                inner join detail_kerja 
                inner join bidang_keahlian on detail_kerja.id_bidang_keahlian_fk_1=bidang_keahlian.id_bidang_keahlian and detail_kerja.user_id_fk=profile_pencari_kerja.user_id_fk
                where bidang_keahlian=:bidang_keahlian
                order by user_id_fk DESC";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("bidang_keahlian", $bidang_keahlian, PDO::PARAM_STR);
            }elseif($tahun_lulus){
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi where tahun_lulus=:tahun_lulus ORDER BY user_id_fk DESC";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("tahun_lulus", $tahun_lulus, PDO::PARAM_STR);
            }else{
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi ORDER BY user_id_fk DESC";
                $stmt = $db->prepare($sql);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;


            echo '{"feedData": ' . json_encode($feedData) . '}';

        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function searchfeedPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $keyword=$data->keyword;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
 
                $sql = "SELECT user_id_fk,nama_lengkap,prodi,tahun_lulus,ttg_saya from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi where nama_lengkap like ':keyword' ORDER BY user_id_fk DESC";
                $stmt->bindParam("keyword", $keyword, PDO::PARAM_STR);
                $stmt = $db->prepare($sql);

            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            echo '{"feedData": ' . json_encode($feedData) . '}';

  
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function profileUserPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $profileUserData = '';
            $db = getDB();
                $sql = "SELECT * from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi and profile_pencari_kerja.user_id_fk=:user_id inner join user on profile_pencari_kerja.user_id_fk=user.user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $profileUserData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($profileUserData)
            echo '{"profileUserData": ' . json_encode($profileUserData) . '}';
            else
            echo '{"profileUserData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function profileUserPKHire(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $user_id_fk=$data->user_id_fk;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $profileUserData = '';
            $db = getDB();
                $sql = "SELECT * from profile_pencari_kerja inner join program_studi on profile_pencari_kerja.id_prodi_fk=program_studi.id_prodi and profile_pencari_kerja.user_id_fk=:user_id_fk inner join user on profile_pencari_kerja.user_id_fk=user.user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id_fk", $user_id_fk, PDO::PARAM_INT);
            $stmt->execute();
            $profileUserData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($profileUserData)
            echo '{"profileUserData": ' . json_encode($profileUserData) . '}';
            else
            echo '{"profileUserData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function profileDetailPK(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $profileUserDetailData = '';
            $db = getDB();
                $sql = "SELECT*from detail_kerja where user_id_fk=:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $profileUserDetailData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($profileUserDetailData)
            echo '{"profileUserDetailData": ' . json_encode($profileUserDetailData) . '}';
            else
            echo '{"profileUserDetailData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function profileDetailPKHire(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $user_id_fk=$data->user_id_fk;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $profileUserDetailData = '';
            $db = getDB();
                $sql = "SELECT*from detail_kerja where user_id_fk=:user_id_fk";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id_fk", $user_id_fk, PDO::PARAM_INT);
            $stmt->execute();
            $profileUserDetailData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($profileUserDetailData)
            echo '{"profileUserDetailData": ' . json_encode($profileUserDetailData) . '}';
            else
            echo '{"profileUserDetailData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


function profilePerusahaan(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
                $sql = "SELECT * from profile_perusahaan inner join user on profile_perusahaan.userID_fk=user.user_id and profile_perusahaan.userID_fk=:user_id";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

function feedUname(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $lastCreated = $data->lastCreated;
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            if($lastCreated){
                $sql = "SELECT username FROM users WHERE user_id_fk=:user_id AND created < :lastCreated DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
                $stmt->bindParam("lastCreated", $lastCreated, PDO::PARAM_STR);
            }
            else{
                $sql = "SELECT username FROM users WHERE user_id_fk=:user_id DESC LIMIT 5";
                $stmt = $db->prepare($sql);
                $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            }
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);
           
            $db = null;

            if($feedData)
            echo '{"feedData": ' . json_encode($feedData) . '}';
            else
            echo '{"feedData": ""}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}

function feedUpdate(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $feed=$data->feed;
    
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
         
            
            $feedData = '';
            $db = getDB();
            $sql = "INSERT INTO feed ( feed, created, user_id_fk) VALUES (:feed,:created,:user_id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("feed", $feed, PDO::PARAM_STR);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $created = time();
            $stmt->bindParam("created", $created, PDO::PARAM_INT);
            $stmt->execute();
            


            $sql1 = "SELECT * FROM feed WHERE user_id_fk=:user_id ORDER BY feed_id DESC LIMIT 1";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt1->execute();
            $feedData = $stmt1->fetch(PDO::FETCH_OBJ);


            $db = null;
            echo '{"feedData": ' . json_encode($feedData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }

}



function feedDelete(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $feed_id=$data->feed_id;
    
    $systemToken=apiToken($user_id);
   
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            $sql = "Delete FROM feed WHERE user_id_fk=:user_id AND feed_id=:feed_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("feed_id", $feed_id, PDO::PARAM_INT);
            $stmt->execute();
            
           
            $db = null;
            echo '{"success":{"text":"Feed deleted"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }   
    
}
$app->post('/userImage','userImage'); /* User Details */
function userImage(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    $imageB64=$data->imageB64;
    $systemToken=apiToken($user_id);
    try {
        if(1){
            $db = getDB();
            $sql = "INSERT INTO imagesData(b64,user_id_fk) VALUES(:b64,:user_id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindParam("b64", $imageB64, PDO::PARAM_STR);
            $stmt->execute();
            $db = null;
            echo '{"success":{"status":"uploaded"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

$app->post('/getImages', 'getImages');
function getImages(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $user_id=$data->user_id;
    $token=$data->token;
    
    $systemToken=apiToken($user_id);
    try {
        if(1){
            $db = getDB();
            $sql = "SELECT b64 FROM imagesData";
            $stmt = $db->prepare($sql);
           
            $stmt->execute();
            $imageData = $stmt->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"imageData": ' . json_encode($imageData) . '}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

?>
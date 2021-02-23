<?php 

function getAnnoucements(&$annoucements) {
  $pdo = Database::getInstance()->getConnection();

    $annoucements_query = 'SELECT * FROM tbl_annoucements';
    $annoucements_set = $pdo->query($annoucements_query);
    $annoucements = $annoucements_set->fetchAll(PDO::FETCH_ASSOC);
    if (empty($annoucements)) {
      return 'Unable to get annoucements';
    }
    return;
}